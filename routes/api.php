<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ItemController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('products',[ItemController::class,'index']);
Route::post('products/{id}',[ItemController::class,'show']);
Route::post('products',[ItemController::class,'store']);
Route::post('products/{id}',[ItemController::class,'update']);

Route::get('books',[ItemController::class,'index']);
Route::post('books/{id}',[ItemController::class,'show']);
Route::post('books',[ItemController::class,'store']);
Route::post('books/{id}',[ItemController::class,'update']);
