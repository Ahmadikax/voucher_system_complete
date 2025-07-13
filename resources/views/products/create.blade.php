<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product - Voucher System</title>
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Create New Product</h1>
        
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" id="price" name="price" value="{{ old('price') }}" step="0.01" min="0" required>
                @error('price')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="description">Description (Optional)</label>
                <textarea id="description" name="description">{{ old('description') }}</textarea>
                @error('description')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="image_url">Image URL (Optional)</label>
                <input type="text" id="image_url" name="image_url" value="{{ old('image_url') }}">
                @error('image_url')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn">Create Product</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>