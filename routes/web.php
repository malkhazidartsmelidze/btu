<?php

use Illuminate\Support\Facades\Route;

Route::get('/products/all', '\App\Http\Controllers\ProductController@getAllProducts')->name('products.all');
Route::post('/products/save', '\App\Http\Controllers\ProductController@saveProduct')->name('products.save');
Route::get('/products/{id}/edit', '\App\Http\Controllers\ProductController@editProduct')->name('products.edit');
Route::post('/products/{id}/update', '\App\Http\Controllers\ProductController@updateProduct')->name('products.update');
Route::post('/products/delete', '\App\Http\Controllers\ProductController@deleteProduct')->name('products.delete');
