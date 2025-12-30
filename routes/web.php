<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotifiController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductLaptopController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');

//GOOGLE AUTH
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/auth/google', [GoogleController::class, 'redirect'])->name('google.login');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/login');
})->name('logout');

Route::get('/auth/google/callback', [GoogleController::class, 'callback']);

//AUTH MANUAL
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// // MIDDLWWARE
Route::middleware(['auth'])->prefix('apps')->group(function () {

    Route::get('/', [AppController::class, 'index'])
        ->name('apps.index');

    Route::get('/notifi', [NotifiController::class, 'index'])->name('notifi.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

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
});
