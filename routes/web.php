<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\PageController;

Route::name('front.')->group(function () {
  Route::get('/', [PageController::class, 'home'])->name('index');
  Route::get('/post/{slug}', [PageController::class, 'singlePost'])->name('post');
  Route::get('/category/{slug}', [PageController::class, 'singleCategory'])->name('category');
});

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
  Route::resource('/category', CategoryController::class)->except('show', 'create');
  Route::resource('/post', PostController::class)->except('show');
});

// Route::get('/products/all', '\App\Http\Controllers\ProductController@getAllProducts')
//   ->name('products.all')
//   ->middleware('guest');
// Route::post('/products/save', '\App\Http\Controllers\ProductController@saveProduct')->name('products.save');
// Route::get('/products/{id}/edit', '\App\Http\Controllers\ProductController@editProduct')->name('products.edit');
// Route::post('/products/{id}/update', '\App\Http\Controllers\ProductController@updateProduct')->name('products.update');
// Route::post('/products/delete', '\App\Http\Controllers\ProductController@deleteProduct')->name('products.delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/custom/register', [App\Http\Controllers\AuthorizationController::class, 'register'])->name('auth.custom.register');
Route::post('/custom/login', [App\Http\Controllers\AuthorizationController::class, 'login'])->name('auth.custom.login');
Route::post('/custom/logout', [App\Http\Controllers\AuthorizationController::class, 'logout'])->name('auth.custom.logout');


// Route::get('testlayout', function () {
//   return view('layouts.main');
// });
