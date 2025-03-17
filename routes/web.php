<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


// Dashboard routes
// products
Route::get('products', [ProductController::class, 'index']);
Route::get('products/create', [ProductController::class, 'createProduct']);
Route::post('products/store', [ProductController::class, 'storeProduct']);
Route::get('products/edit/{id}', [ProductController::class, 'editProduct']);
Route::get('products/delete/{id}', [ProductController::class, 'destroyProduct']);
Route::patch('products/update/{id}', [ProductController::class, 'updateProduct']);
// categories
Route::get('categories', [CategoryController::class, 'index']);
Route::get('categories/create', [CategoryController::class, 'createCategory']);
Route::post('categories/store', [CategoryController::class, 'storeCategory']);
Route::get('categories/edit/{id}', [CategoryController::class, 'editCategory']);
Route::get('categories/delete/{id}', [CategoryController::class, 'destroyCategory']);
Route::patch('categories/update/{id}', [CategoryController::class, 'updateCategory']);


// Front routes
// Route::get('/', function () {
//     return view('home.index');
// });
Route::get('/', [FrontController::class, 'index']);



