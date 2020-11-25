<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

Route::middleware('custom_auth')->name('test.')->prefix('/app/user')->group(function () {
  Route::get('test', [ProductController::class, 'index'])->middleware('custom_guest');
  Route::get('test2', [ProductController::class, 'index'])->name('routes.2');
  Route::get('test3', [ProductController::class, 'index'])->name('routes.3');
});

Route::middleware('custom_auth')->group(function () {
  Route::prefix('product')
    ->name('products.')
    ->group(function () {
      Route::get('/', [ProductController::class, 'index'])->name('all');
      Route::get('/editsomeproduct', [ProductController::class, 'edit'])->name('edit');
      Route::post('/update', [ProductController::class, 'update'])->name('update');
      Route::post('/delete', [ProductController::class, 'delete'])->name('delete');
      Route::post('/store', [ProductController::class, 'store'])->name('store');
    });

  Route::get('/home', [HomeController::class, 'index'])->name('home');
});



Route::prefix('custom')
  ->name('custom.')
  ->group(function () {
    Route::post('/login', [AuthController::class, 'customLogin'])->name('login')->middleware('custom_guest');
    Route::post('/register', [AuthController::class, 'customRegister'])->name('register')->middleware('custom_guest');
    Route::post('/logout', [AuthController::class, 'customLogout'])->name('logout')->middleware('custom_auth');
  });

Auth::routes();
