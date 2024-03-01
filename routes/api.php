<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/products/search/{name}', [ProductController::class, 'search']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/products', [ProductController::class, 'index']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/register-shop', [AuthController::class, 'registershop']);
Route::put('/company-status/{nui}/{statusId}', [BusinessController::class, 'updateStatus']);
Route::get('/inactive-business', [BusinessController::class, 'getAllBusinessInfo']);
Route::get('/products-sale', [ProductController::class, 'sales']);
Route::get('/products-new', [ProductController::class, 'newproducts']);
Route::get('/products/read/{name}', [ProductController::class, 'readmore']);
Route::post('/orders/create/{userId}/{productId}', [OrderController::class, 'store']);
Route::get('/orders/all', [OrderController::class, 'index']);
Route::delete('/delete-item/{slug}', [ProductController::class, 'destroy']);
Route::put('/update-products/{slug}', [ProductController::class, 'update']);
Route::post('/add-product', [ProductController::class, 'store']);
Route::put('/orders/status/{orderId}', [OrderController::class, 'updateStatus']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/my-orders/{userId}', [OrderController::class, 'getMyOrders'])->name('my-orders');
    Route::post('/user/edit', [UserController::class, 'edit']);
    Route::get('/user/data', [UserController::class, 'getUserData']);

});

Route::group(['middleware' => ['auth:sanctum', 'role:businessman']], function () {

});


Route::group(['middleware' => ['auth:sanctum', 'role:admin']], function () {


});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
