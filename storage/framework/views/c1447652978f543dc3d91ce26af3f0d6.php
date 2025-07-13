<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Voucher System</title>
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
            max-width: 1200px;
            margin: 0 auto;
        }
        .alert {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
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
            font-size: 14px;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn-warning {
            background-color: #ffc107;
            color: #212529;
        }
        .btn-sm {
            padding: 5px 10px;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .code-stats {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            margin-right: 5px;
            font-size: 12px;
        }
        .available {
            background-color: #d4edda;
            color: #155724;
        }
        .sold {
            background-color: #f8d7da;
            color: #721c24;
        }
        .reserved {
            background-color: #fff3cd;
            color: #856404;
        }
        .actions {
            display: flex;
            gap: 5px;
        }
        form {
            display: inline;
        }
        .archived-section {
            margin-top: 40px;
            opacity: 0.7;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Products</h1>
        
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        
        <div>
            <a href="<?php echo e(route('products.create')); ?>" class="btn">Add New Product</a>
        </div>
        
        <h2>Active Products</h2>
        
        <?php if($products->isEmpty()): ?>
            <p>No active products found.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Codes</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($product->name); ?></td>
                            <td>$<?php echo e(number_format($product->price, 2)); ?></td>
                            <td>
                                <span class="code-stats available"><?php echo e($product->availableCodesCount()); ?> Available</span>
                                <span class="code-stats sold"><?php echo e($product->soldCodesCount()); ?> Sold</span>
                                <span class="code-stats reserved"><?php echo e($product->reservedCodesCount()); ?> Reserved</span>
                            </td>
                            <td class="actions">
                                <a href="<?php echo e(route('product.codes.index', $product->id)); ?>" class="btn btn-sm">Manage Codes</a>
                                <a href="<?php echo e(route('products.edit', $product->id)); ?>" class="btn btn-sm">Edit</a>
                                
                                <form action="<?php echo e(route('products.archive', $product->id)); ?>" method="POST" onsubmit="return confirm('Are you sure you want to archive this product?')">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-warning btn-sm">Archive</button>
                                </form>
                                
                                <form action="<?php echo e(route('products.destroy', $product->id)); ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this product? This action cannot be undone.')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php endif; ?>
        
        <?php if(!$archivedProducts->isEmpty()): ?>
            <div class="archived-section">
                <h2>Archived Products</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Codes</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $archivedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($product->name); ?></td>
                                <td>$<?php echo e(number_format($product->price, 2)); ?></td>
                                <td>
                                    <span class="code-stats available"><?php echo e($product->availableCodesCount()); ?> Available</span>
                                    <span class="code-stats sold"><?php echo e($product->soldCodesCount()); ?> Sold</span>
                                    <span class="code-stats reserved"><?php echo e($product->reservedCodesCount()); ?> Reserved</span>
                                </td>
                                <td class="actions">
                                    <a href="<?php echo e(route('product.codes.index', $product->id)); ?>" class="btn btn-sm">Manage Codes</a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\voucher_system_complete\resources\views/products/index.blade.php ENDPATH**/ ?>