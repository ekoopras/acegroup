<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductLaptopController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');

//GOOGLE AUTH
// Route::get('/login', function () {
//     return view('auth.login');
// })->name('login');

// Route::get('/auth/google', [GoogleController::class, 'redirect'])->name('google.login');

// Route::post('/logout', function () {
//     Auth::logout();
//     request()->session()->invalidate();
//     request()->session()->regenerateToken();

//     return redirect('/login');
// })->name('logout');

// Route::get('/auth/google/callback', [GoogleController::class, 'callback']);

// // MIDDLWWARE
// Route::middleware('auth')->group(function () {

Route::get('/apps', [AppController::class, 'index'])
    ->name('apps.index');

Route::get('/notifikasi', fn() => view('notifikasi.index'))
    ->name('notifikasi.index');

Route::get('/setting', [SettingController::class, 'index'])
    ->name('setting.index');

Route::resource('category', CategoryController::class);

Route::get('/product/{slug}', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/{category:slug}/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{category:slug}/{product}/edit', [ProductController::class, 'edit'])
    ->name('product.edit');
Route::put('/product/{category:slug}/{product}', [ProductController::class, 'update'])
    ->name('product.update');
Route::delete('/product/{category:slug}/{product}', [ProductController::class, 'destroy'])
    ->name('product.destroy');
// });
