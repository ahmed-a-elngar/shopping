<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RedirectController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::middleware(['auth'])->group(function (){
        // shared between customer & seller
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', [App\Http\Controllers\RedirectController::class, 'index'])->name('index');

    Route::middleware(['seller'])->group(function (){
        // seller
        Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
        Route::get('/new', [App\Http\Controllers\RedirectController::class, 'new_product'])->name('new_product');
        Route::post('/new', [App\Http\Controllers\ProductController::class, 'create']);
        Route::get('/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('edit_product');
        Route::post('/edit/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('update_product');
        Route::post('/delete/{id}', [App\Http\Controllers\ProductController::class, 'delete'])->name('delete_product');
        Route::post('/search/{input}', [App\Http\Controllers\ProductController::class, 'search'])->name('search_product');
        Route::get('/out', [App\Http\Controllers\RedirectController::class, 'out'])->name('out');
        Route::get('/orders', [App\Http\Controllers\OrderItemController::class, 'view'])->name('orders');
    });

    Route::middleware(['customer'])->group(function () {
        // customer
        Route::get('/products/{gendar}', [App\Http\Controllers\ProductController::class, 'view'])->name('customer_products');
        Route::post('/products/details/{gendar}', [App\Http\Controllers\ProductController::class, 'details'])->name('customer_product_details');
        Route::post('/products/cart/push/{product_id}', [App\Http\Controllers\CartController::class, 'push_cart']);
        Route::get('/cart', [App\Http\Controllers\ProductController::class, 'cart'])->name('cart');
        Route::post('/cart/submit/{quantities}', [App\Http\Controllers\OrderController::class, 'add']);
        Route::post('products/{gendar}/filter/{filter}', [App\Http\Controllers\ProductController::class, 'filter']);
        Route::get('products/{gendar}/filter/{filter}', [App\Http\Controllers\ProductController::class, 'filter']);
    });
});