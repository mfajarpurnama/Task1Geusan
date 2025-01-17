<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductVariantController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/create', [ProductController::class, 'store'])->name('products.create');
Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/products/edit/{id}', [ProductController::class, 'update'])->name('products.edit');
Route::get('/products/delete/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
// Menampilkan detail variant produk
Route::get('/products/{productId}/variants/{variantId}', [ProductVariantController::class, 'show'])->name('variants.show');
Route::get('/product_variants/create', [ProductVariantController::class, 'create'])->name('product_variants.create');
Route::post('/product_variants', [ProductVariantController::class, 'store'])->name('product_variants.store');
Route::get('/product_variants/edit/{id}', [ProductVariantController::class, 'edit'])->name('product_variants.edit');
Route::post('/product_variants/edit/{id}', [ProductVariantController::class, 'update'])->name('product_variants.edit');

Route::get('/products_variants/delete/{id}', [ProductVariantController::class, 'destroy'])->name('products.destroy');
// Mengupdate produk
// Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');


