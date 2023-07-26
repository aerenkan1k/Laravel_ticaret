<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;

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
    return view('home');
});
Route::prefix('/')->middleware('auth')->group(function(){
    Route::get('cart', [ProductsController::class, 'cart'])->name('cart')->middleware('setLocale');
});

Route::get('/', [ProductsController::class, 'index'])->name('welcome')->middleware('setLocale');
Route::get('/dil-degistir', [ProductsController::class, 'changelocale'])->name('changelocale');
Route::get('contact', [PageController::class, 'contact'])->name('contact')->middleware('setLocale');
Route::get('add-to-cart/{id}', [ProductsController::class, 'addToCart'])->name('add_to_cart');
Route::patch('update-cart', [ProductsController::class, 'update'])->name('update_cart');
Route::delete('remove-from-cart', [ProductsController::class, 'remove'])->name('remove_from_cart');

Route::get('/home', [HomeController::class, 'index'])->middleware('setLocale');  
Route::get('/shopping-cart', [BookController::class, 'bookCart'])->name('shopping.cart');
Route::get('/book/{id}', [BookController::class, 'addBooktoCart'])->name('addbook.to.cart');
Route::patch('/update-shopping-cart', [BookController::class, 'updateCart'])->name('update.sopping.cart');
Route::delete('/delete-cart-product', [BookController::class, 'deleteProduct'])->name('delete.cart.product');

Auth::routes();

Route::get('/products', [App\Http\Controllers\ProductsController::class, 'index'])->name('products')->middleware('setLocale');
Route::get('/books', [App\Http\Controllers\BookController::class, 'index'])->name('books')->middleware('setLocale');