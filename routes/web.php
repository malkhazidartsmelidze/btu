<?php

use Illuminate\Support\Facades\Route;

Route::get('/product', '\App\Http\Controllers\ProductController@index')->name('products.all');
Route::get('/product/editsomeproduct', '\App\Http\Controllers\ProductController@edit')->name('products.edit');
Route::post('/product/update', '\App\Http\Controllers\ProductController@update')->name('products.update');
Route::post('/product/delete', '\App\Http\Controllers\ProductController@delete')->name('products.delete');
Route::post('/product/store', '\App\Http\Controllers\ProductController@store')->name('products.store');
