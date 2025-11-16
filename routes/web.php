<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, 'Beranda'])->name('beranda');
Route::get('/about', [AboutController::class, 'Index'])->name('about');
Route::get('/produk', [ProductController::class, 'Index'])->name('produk');
Route::get('/admin/dashboard', [AdminController::class, 'Dashboard'])->name('dashboard');
Route::get('/admin/user', [AdminController::class, 'User'])->name('user');
Route::get('/admin/toko', [AdminController::class, 'Toko'])->name('toko.admin');

Route::middleware(['member'])->group(function () {
    Route::get('/toko', [StoreController::class, 'Index'])->name('toko');
});

Route::get('/login', [AuthController::class, 'Index'])->name('login');
Route::post('/login', [AuthController::class, 'Authentication'])->name('login.post');
Route::get('/logout', [AuthController::class, 'Logout'])->name('logout');
Route::get('/register', [AuthController::class, 'Register'])->name('register');
Route::post('/register', [AuthController::class, 'Regist'])->name('register.post');