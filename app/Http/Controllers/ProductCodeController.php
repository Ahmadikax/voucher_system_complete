<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCode;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProductCodeController extends Controller
{
    /**
     * Display a listing of the product codes.
     */
    public function index(Request $request, Product $product)
    {
        // Handle delete all codes request
        if ($request->has('delete_all')) {
            // Delete all codes for this product
            $product->productCodes()->delete();
            
            return redirect()->route('product.codes.index', $product->id)
                ->with('success', 'All codes have been deleted successfully.');
        }
        
        $codes = $product->productCodes()
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        
        $availableCount = $product->availableCodesCount();
        $soldCount = $product->soldCodesCount();
        $reservedCount = $product->reservedCodesCount();
        
        $codeMasking = Setting::getValue('code_masking', 'true') === 'true';
        
        return view('codes.index', compact(
            'product',
            'codes',
            'availableCount',
            'soldCount',
            'reservedCount',
            'codeMasking'
        ));
    }

    /**
     * Show the form for creating a new product code.
     */
    public function create(Product $product)
    {
        return view('codes.create', compact('product'));
    }

    /**
     * Store a newly created product code in storage.
     */
    public function store(Request $request, Product $product)
    {
        $validated = $request->validate([
            'code' => [
                'required',
                'string',
                Rule::unique('product_codes', 'code')->where(function ($query) use ($product) {
                    return $query->where('product_id', $product->id);
                }),
            ],
            'description' => 'nullable|string',
            'expires_at' => 'nullable|date',
            'code_image' => 'nullable|image|max:2048',
        ]);

        $code = new ProductCode([
            'code' => $validated['code'],
            'description' => $validated['description'] ?? null,
            'expires_at' => $validated['expires_at'] ?? null,
            'status' => 'available',
            'last_modified_at' => now(),
        ]);

        // Handle image upload if provided
        if ($request->hasFile('code_image')) {
            $path = $request->file('code_image')->store('code_images', 'public');
            $code->code_image_path = $path;
        }

        $product->productCodes()->save($code);
        
        // Log the creation
        $code->log('created', 'Code created manually');

        return redirect()->route('product.codes.index', $product->id)
            ->with('success', 'Code created successfully.');
    }

    /**
     * Import codes from a file.
     */
    public function import(Request $request, Product $product)
    {
        $request->validate([
            'import_file' => 'required|file',
            'description' => 'nullable|string',
            'expires_at' => 'nullable|date',
        ]);

        $file = $request->file('import_file');
        $allowedFileTypes = explode(',', Setting::getValue('allowed_file_types', 'csv,txt'));
        
        if (!in_array($file->getClientOriginalExtension(), $allowedFileTypes)) {
            return back()->withErrors(['import_file' => 'Invalid file type. Allowed types: ' . implode(', ', $allowedFileTypes)]);
        }

        $content = file_get_contents($file->getRealPath());
        $codes = preg_split('/\r\n|\r|\n/', $content);
        $codes = array_filter($codes); // Remove empty lines
        
        $importCount = 0;
        $duplicateCount = 0;
        
        foreach ($codes as $codeText) {
            $codeText = trim($codeText);
            
            // Skip if empty
            if (empty($codeText)) {
                continue;
            }
            
            // Check if code already exists for this product
            $exists = $product->productCodes()->where('code', $codeText)->exists();
            
            if ($exists) {
                $duplicateCount++;
                continue;
            }
            
            // Create new code
            $code = new ProductCode([
                'code' => $codeText,
                'description' => $request->description,
                'expires_at' => $request->expires_at,
                'status' => 'available',
                'last_modified_at' => now(),
            ]);
            
            $product->productCodes()->save($code);
            $code->log('imported', 'Code imported from file');
            $importCount++;
        }
        
        $message = "{$importCount} codes imported successfully.";
        if ($duplicateCount > 0) {
            $message .= " {$duplicateCount} duplicate codes were skipped.";
        }
        
        return redirect()->route('product.codes.index', $product->id)
            ->with('success', $message);
    }

    /**
     * Export codes to a file.
     */
    public function export(Request $request, Product $product)
    {
        $request->validate([
            'format' => 'required|in:csv,txt,pdf',
            'status' => 'nullable|in:all,available,sold,reserved',
        ]);

        $status = $request->status ?? 'all';
        
        $query = $product->productCodes();
        
        if ($status !== 'all') {
            $query->where('status', $status);
        }
        
        $codes = $query->get();
        
        if ($codes->isEmpty()) {
            return back()->withErrors(['export' => 'No codes to export.']);
        }
        
        $format = $request->format;
        $filename = $product->name . '_codes_' . date('Y-m-d') . '.' . $format;
        
        if ($format === 'csv') {
            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ];
            
            $callback = function() use ($codes) {
                $file = fopen('php://output', 'w');
                fputcsv($file, ['Code', 'Description', 'Status', 'Expires At']);
                
                foreach ($codes as $code) {
                    fputcsv($file, [
                        $code->code,
                        $code->description,
                        $code->status,
                        $code->expires_at ? $code->expires_at->format('Y-m-d') : '',
                    ]);
                }
                
                fclose($file);
            };
            
            return response()->stream($callback, 200, $headers);
        } elseif ($format === 'txt') {
            $content = '';
            
            foreach ($codes as $code) {
                $content .= $code->code . "\n";
            }
            
            return response($content)
                ->header('Content-Type', 'text/plain')
                ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
        } elseif ($format === 'pdf') {
            // For simplicity, we'll just return a text file with PDF extension
            // In a real application, you would use a PDF library
            $content = "Product: {$product->name}\n\n";
            
            foreach ($codes as $code) {
                $content .= "Code: {$code->code}\n";
                $content .= "Status: {$code->status}\n";
                if ($code->description) {
                    $content .= "Description: {$code->description}\n";
                }
                if ($code->expires_at) {
                    $content .= "Expires: {$code->expires_at->format('Y-m-d')}\n";
                }
                $content .= "\n";
            }
            
            return response($content)
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
        }
    }

    /**
     * Remove the specified product code from storage.
     */
    public function destroy(ProductCode $code)
    {
        $productId = $code->product_id;
        
        // Delete image if exists
        if ($code->code_image_path) {
            Storage::disk('public')->delete($code->code_image_path);
        }
        
        $code->delete();

        return redirect()->route('product.codes.index', $productId)
            ->with('success', 'Code deleted successfully.');
    }

    /**
     * Send code via email.
     */
    public function sendEmail(Request $request, ProductCode $code)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        
        // In a real application, you would send an actual email here
        // For this exercise, we'll just log the action
        
        $code->log('email_sent', 'Code sent to: ' . $request->email);
        
        // Mark as sold if requested
        if ($request->has('mark_as_sold')) {
            $code->markAsSold();
        }
        
        return redirect()->route('product.codes.index', $code->product_id)
            ->with('success', 'Code sent to ' . $request->email);
    }

    /**
     * Reset code status to available.
     */
    public function resetStatus(ProductCode $code)
    {
        $code->resetStatus();
        
        return redirect()->route('product.codes.index', $code->product_id)
            ->with('success', 'Code reset to available status.');
    }
}