<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Codes - Voucher System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        h1 {
            margin-bottom: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="date"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            height: 100px;
        }
        .btn {
            display: inline-block;
            padding: 8px 12px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }
        .btn-secondary {
            background-color: #6c757d;
        }
        .error {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
        }
        .product-info {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .alert {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }
        .file-format-info {
            background-color: #e2f3fc;
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .file-format-info h3 {
            margin-top: 0;
        }
        .file-format-info pre {
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 4px;
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Import Codes</h1>
        
        <div class="product-info">
            <h3>Product: {{ $product->name }}</h3>
            <p>Price: ${{ number_format($product->price, 2) }}</p>
        </div>
        
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="file-format-info">
            <h3>File Format Information</h3>
            <p>Upload a CSV or TXT file with one code per line.</p>
            <p>Example format:</p>
            <pre>ABC123
DEF456
GHI789</pre>
            <p>Allowed file types: {{ $allowedFileTypes }}</p>
        </div>
        
        <form action="{{ route('product.codes.import', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="import_file">Select File *</label>
                <input type="file" id="import_file" name="import_file" required>
                @error('import_file')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="description">Description for All Imported Codes (Optional)</label>
                <textarea id="description" name="description">{{ old('description') }}</textarea>
                @error('description')
                    <div class="error">{{ $message }}</div>
                @enderror
                <small>This description will be applied to all imported codes.</small>
            </div>
            
            <div class="form-group">
                <label for="expires_at">Expiration Date for All Imported Codes (Optional)</label>
                <input type="date" id="expires_at" name="expires_at" value="{{ old('expires_at') }}">
                @error('expires_at')
                    <div class="error">{{ $message }}</div>
                @enderror
                <small>This expiration date will be applied to all imported codes.</small>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn">Import Codes</button>
                <a href="{{ route('product.codes.index', $product->id) }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
        
        <div class="google-sheet-info" style="margin-top: 30px; padding: 15px; background-color: #f8f9fa; border-radius: 4px;">
            <h3>Import from Google Sheets</h3>
            <p>To import from Google Sheets:</p>
            <ol>
                <li>Open your Google Sheet</li>
                <li>Select the column with codes</li>
                <li>Export as CSV</li>
                <li>Upload the CSV file using the form above</li>
            </ol>
            <p><em>Note: Direct Google Sheets API integration is coming soon.</em></p>
        </div>
    </div>
</body>
</html>