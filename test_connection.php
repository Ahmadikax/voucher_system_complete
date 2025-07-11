<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Product;
use App\Models\ProductCode;
use App\Models\Setting;

echo "Testing database connection and models...\n";

try {
    // Test database connection
    DB::connection()->getPdo();
    echo "Database connection successful: " . DB::connection()->getDatabaseName() . "\n";

    // Test Product model
    $productCount = Product::count();
    echo "Product model working. Total products: " . $productCount . "\n";

    // Test ProductCode model
    $codeCount = ProductCode::count();
    echo "ProductCode model working. Total codes: " . $codeCount . "\n";

    // Test Setting model
    $settings = Setting::all();
    echo "Setting model working. Total settings: " . $settings->count() . "\n";
    
    echo "All tests passed successfully!\n";
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}