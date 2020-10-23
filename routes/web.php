<?php

use Illuminate\Support\Facades\Route;

Route::get('/product/all', '\App\Http\Controllers\ProductController@getAllProducts');
Route::post('/product/save', '\App\Http\Controllers\ProductController@saveProduct');
Route::get('/product/edit', '\App\Http\Controllers\ProductController@editProduct');
Route::get('/product/update', '\App\Http\Controllers\ProductController@updateProduct');
Route::post('/product/delete', '\App\Http\Controllers\ProductController@deleteProduct');
