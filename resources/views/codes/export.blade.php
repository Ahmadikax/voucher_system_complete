<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Codes - Voucher System</title>
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
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
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
        .export-options {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }
        .export-option {
            flex: 1;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .export-option h3 {
            margin-top: 0;
        }
        .format-info {
            margin-top: 30px;
            background-color: #e2f3fc;
            padding: 15px;
            border-radius: 4px;
        }
        .format-info h3 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Export Codes</h1>
        
        <div class="product-info">
            <h3>Product: {{ $product->name }}</h3>
            <p>Price: ${{ number_format($product->price, 2) }}</p>
            <p>Total Codes: {{ $product->productCodes()->count() }}</p>
            <p>Available Codes: {{ $product->availableCodesCount() }}</p>
            <p>Sold Codes: {{ $product->soldCodesCount() }}</p>
            <p>Reserved Codes: {{ $product->reservedCodesCount() }}</p>
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
        
        <form action="{{ route('product.codes.export', $product->id) }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="format">Export Format</label>
                <select id="format" name="format" required>
                    <option value="csv">CSV (Comma Separated Values)</option>
                    <option value="txt">TXT (Plain Text)</option>
                    <option value="pdf">PDF (Portable Document Format)</option>
                </select>
                @error('format')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="status">Filter by Status</label>
                <select id="status" name="status">
                    <option value="all">All Codes</option>
                    <option value="available">Available Codes Only</option>
                    <option value="sold">Sold Codes Only</option>
                    <option value="reserved">Reserved Codes Only</option>
                </select>
                @error('status')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn">Export Codes</button>
                <a href="{{ route('product.codes.index', $product->id) }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
        
        <div class="format-info">
            <h3>Export Format Information</h3>
            
            <div class="export-options">
                <div class="export-option">
                    <h3>CSV Format</h3>
                    <p>Includes all code details in a spreadsheet-compatible format:</p>
                    <ul>
                        <li>Code</li>
                        <li>Description</li>
                        <li>Status</li>
                        <li>Expiration Date</li>
                    </ul>
                    <p>Best for importing into spreadsheet software.</p>
                </div>
                
                <div class="export-option">
                    <h3>TXT Format</h3>
                    <p>Simple text file with one code per line.</p>
                    <p>Best for simple code lists or sharing with other systems.</p>
                </div>
                
                <div class="export-option">
                    <h3>PDF Format</h3>
                    <p>Formatted document with all code details.</p>
                    <p>Best for printing or formal documentation.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>