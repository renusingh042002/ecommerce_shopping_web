<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[ProductController::class,'index'])->name('products.show');

// Route::get('/',[ProductController::class,'index'])->name('products.index');
// Route::get('product/create',[ProductController::class,'create'])->name('products.create');


Route::resource('products', ProductController::class);
Route::get('/products/restore/{id}',[ProductController::class,'restore'])->name('products.restore');
Route::get('/products/archive/{id}',[ProductController::class,'delete'])->name('products.archive');