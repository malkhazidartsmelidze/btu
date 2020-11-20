<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CategoryController;

Route::get('/', function () {
  return view('index');
});

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
  Route::prefix('category')->name('category.')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::post('/store', [CategoryController::class, 'store'])->name('store');
    Route::post('/{id}/delete', [CategoryController::class, 'delete'])->name('delete');
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('edit');
    Route::post('/{id}/update', [CategoryController::class, 'update'])->name('update');
  });
});

Route::get('/products/all', '\App\Http\Controllers\ProductController@getAllProducts')
  ->name('products.all')
  ->middleware('guest');
Route::post('/products/save', '\App\Http\Controllers\ProductController@saveProduct')->name('products.save');
Route::get('/products/{id}/edit', '\App\Http\Controllers\ProductController@editProduct')->name('products.edit');
Route::post('/products/{id}/update', '\App\Http\Controllers\ProductController@updateProduct')->name('products.update');
Route::post('/products/delete', '\App\Http\Controllers\ProductController@deleteProduct')->name('products.delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/custom/register', [App\Http\Controllers\AuthorizationController::class, 'register'])->name('auth.custom.register');
Route::post('/custom/login', [App\Http\Controllers\AuthorizationController::class, 'login'])->name('auth.custom.login');
Route::post('/custom/logout', [App\Http\Controllers\AuthorizationController::class, 'logout'])->name('auth.custom.logout');


Route::get('testlayout', function () {
  return view('layouts.main');
});
