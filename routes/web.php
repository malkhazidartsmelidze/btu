<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\PageController;

Route::name('front.')->group(function () {
  Route::get('/', [PageController::class, 'home'])->name('index');
  Route::get('/post/{slug}', [PageController::class, 'singlePost'])->name('post');
  Route::get('/category/{slug}', [PageController::class, 'singleCategory'])->name('category');
});

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
  Route::resource('/category', CategoryController::class)->except('show', 'create');
  Route::resource('/config', ConfigController::class)->except('show', 'create');
  Route::resource('/post', PostController::class)->except('show');
});

Auth::routes();

Route::post('/custom/register', [App\Http\Controllers\AuthorizationController::class, 'register'])->name('auth.custom.register');
Route::post('/custom/login', [App\Http\Controllers\AuthorizationController::class, 'login'])->name('auth.custom.login');
Route::post('/custom/logout', [App\Http\Controllers\AuthorizationController::class, 'logout'])->name('auth.custom.logout');
