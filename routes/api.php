<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test',function(){
    return response()->json('hello');
});

Route::get('/show/posts',[PostController::class,'index']);
Route::post('/post/store',[PostController::class,'store']);
Route::get('/post/show/{id}',[PostController::class,'show']);
Route::post('/post/update/{id}',[PostController::class,'update']);
Route::post('/post/destroy/{id}',[PostController::class,'destroy']);
Route::get('/post/edit/{id}',[PostController::class,'edit']);