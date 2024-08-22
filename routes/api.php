<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductApiController; // Add this line
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('products',[ProductApiController::class,'index']);
Route::post('products',[ProductApiController::class,'store']);
Route::get('products/{id}',[ProductApiController::class,'show']);
Route::put('products/{id}',[ProductApiController::class,'update']);
Route::delete('products/{id}',[ProductApiController::class,'destroy']);
    