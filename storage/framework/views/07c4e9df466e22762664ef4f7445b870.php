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
        <h1>Edit Product: <?php echo e($product->name); ?></h1>
        
        <form action="<?php echo e(route('products.update', $product->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" id="name" name="name" value="<?php echo e(old('name', $product->name)); ?>" required>
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" id="price" name="price" value="<?php echo e(old('price', $product->price)); ?>" step="0.01" min="0" required>
                <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            
            <div class="form-group">
                <label for="description">Description (Optional)</label>
                <textarea id="description" name="description"><?php echo e(old('description', $product->description)); ?></textarea>
                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            
            <div class="form-group">
                <label for="image_url">Image URL (Optional)</label>
                <input type="text" id="image_url" name="image_url" value="<?php echo e(old('image_url', $product->image_url)); ?>">
                <?php $__errorArgs = ['image_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                
                <?php if($product->image_url): ?>
                    <div>
                        <img src="<?php echo e($product->image_url); ?>" alt="<?php echo e($product->name); ?>" class="image-preview">
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn">Update Product</button>
                <a href="<?php echo e(route('products.index')); ?>" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\voucher_system_complete\resources\views/products/edit.blade.php ENDPATH**/ ?>