<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ImageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;



Route::get('/', function () {
    return view('home');
});
Route::prefix('/cart')->middleware('auth')->group(function(){
    Route::get('cart', [ProductsController::class, 'cart'])->name('cart')->middleware('setLocale');
});
Route::get('/', [ProductsController::class, 'index'])->name('welcome')->middleware('setLocale');
Route::get('/dil-degistir', [ProductsController::class, 'changelocale'])->name('changelocale');
Route::get('contact', [PageController::class, 'contact'])->name('contact')->middleware('setLocale');
Route::get('add-to-cart/{id}', [ProductsController::class, 'addToCart'])->name('add_to_cart');
Route::get('show_electronic/{id}', [ProductsController::class, 'show_electronic'])->name('show_electronic')->middleware('setLocale');
Route::get('show_book/{id}', [BookController::class, 'show_book'])->name('show_book')->middleware('setLocale');
Route::patch('update-cart', [ProductsController::class, 'update'])->name('update_cart');
Route::delete('remove-from-cart', [ProductsController::class, 'remove'])->name('remove_from_cart');
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('setLocale');  
Route::get('/shopping-cart', [BookController::class, 'bookCart'])->name('shopping.cart');
Route::get('/book/{id}', [BookController::class, 'addBooktoCart'])->name('addbook.to.cart');
Route::patch('/update-shopping-cart', [BookController::class, 'updateCart'])->name('update.sopping.cart');
Route::delete('/delete-cart-product', [BookController::class, 'deleteProduct'])->name('delete.cart.product');
Auth::routes();
Route::get('/products', [App\Http\Controllers\ProductsController::class, 'index'])->name('products')->middleware('setLocale');
Route::get('/books', [App\Http\Controllers\BookController::class, 'index'])->name('books')->middleware('setLocale');
Route::post('/send_email', [ContactController::class, 'sendEmail'])->name('send_email');


Route::get('/admin/index', [AdminController::class, 'index'])->name('index');


Route::controller(App\Http\Controllers\Admin\AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
  
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
  
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});
  
Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
 
    
        Route::get('/create', [AdminController::class,'create'])->name('admin.create');
        Route::post('store', [AdminController::class,'index'])->name('admin.store');
        Route::post('/create', [AdminController::class, 'store'])->name('admin.store');
        Route::get('show/{id}', [AdminController::class,'show'])->name('admin.show');
        Route::get('edit/{id}', [AdminController::class,'edit'])->name('admin.edit');
        Route::put('edit/{id}', [AdminController::class,'update'])->name('admin.update');
        Route::delete('destroy/{id}', [AdminController::class,'destroy'])->name('admin.destroy');
        Route::get('index', [AdminController::class,'index'])->name('admin.index');
        Route::get('elektronikler', [AdminController::class, 'elektronikler'])->name('admin.elektronikler');
        Route::get('kitaplar', [AdminController::class, 'kitaplar'])->name('admin.kitaplar');
 
        Route::get('/profile', [App\Http\Controllers\Admin\AuthController::class, 'profile'])->name('profile');   
});

        Route::controller(ImageController::class)->group(function(){
        Route::get('image-upload','index');
        Route::post('image-upload','imageUpload')->name('image.store');
});
