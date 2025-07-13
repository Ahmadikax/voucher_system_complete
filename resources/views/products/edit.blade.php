<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product - Voucher System</title>
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
        input[type="number"],
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
        .image-preview {
            max-width: 200px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Product: {{ $product->name }}</h1>
        
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required>
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" step="0.01" min="0" required>
                @error('price')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="description">Description (Optional)</label>
                <textarea id="description" name="description">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="image_url">Image URL (Optional)</label>
                <input type="text" id="image_url" name="image_url" value="{{ old('image_url', $product->image_url) }}">
                @error('image_url')
                    <div class="error">{{ $message }}</div>
                @enderror
                
                @if($product->image_url)
                    <div>
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="image-preview">
                    </div>
                @endif
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn">Update Product</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>