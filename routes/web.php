<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCodeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/products');
});

// Product routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::post('/products/{id}/archive', [ProductController::class, 'archive'])->name('products.archive');

// Product Code routes
Route::get('/products/{product}/codes', [ProductCodeController::class, 'index'])->name('product.codes.index');
Route::get('/products/{product}/codes/create', [ProductCodeController::class, 'create'])->name('product.codes.create');
Route::post('/products/{product}/codes', [ProductCodeController::class, 'store'])->name('product.codes.store');
Route::post('/products/{product}/codes/import', [ProductCodeController::class, 'import'])->name('product.codes.import');
Route::post('/products/{product}/codes/export', [ProductCodeController::class, 'export'])->name('product.codes.export');
Route::delete('/codes/{code}', [ProductCodeController::class, 'destroy'])->name('codes.destroy');
Route::post('/codes/{code}/send-email', [ProductCodeController::class, 'sendEmail'])->name('codes.send-email');
Route::post('/codes/{code}/reset-status', [ProductCodeController::class, 'resetStatus'])->name('codes.reset-status');