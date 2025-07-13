<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Code - Voucher System</title>
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Add New Code</h1>
        
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
        
        <form action="{{ route('product.codes.store', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="code">Code *</label>
                <input type="text" id="code" name="code" value="{{ old('code') }}" required>
                @error('code')
                    <div class="error">{{ $message }}</div>
                @enderror
                <small>This code must be unique for this product.</small>
            </div>
            
            <div class="form-group">
                <label for="description">Description (Optional)</label>
                <textarea id="description" name="description">{{ old('description') }}</textarea>
                @error('description')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="expires_at">Expiration Date (Optional)</label>
                <input type="date" id="expires_at" name="expires_at" value="{{ old('expires_at') }}">
                @error('expires_at')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="code_image">Code Image (Optional)</label>
                <input type="file" id="code_image" name="code_image">
                @error('code_image')
                    <div class="error">{{ $message }}</div>
                @enderror
                <small>Upload an image related to this code (max 2MB).</small>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn">Add Code</button>
                <a href="{{ route('product.codes.index', $product->id) }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>