<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, 'Beranda'])->name('beranda');
Route::get('/about', [AboutController::class, 'Index'])->name('about');
Route::get('/produk', [ProductController::class, 'Index'])->name('produk');

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'Dashboard'])->name('dashboard');
    Route::get('/admin/user', [AdminController::class, 'User'])->name('user');
    Route::post('/admin/user/create', [UserController::class, 'Store'])->name('user.store');
    Route::post('/admin/user/update/{id}', [UserController::class, 'Update'])->name('user.update');
    Route::get('/admin/user/delete/{id}', [UserController::class, 'Delete'])->name('user.delete');
    Route::get('/admin/toko', [AdminController::class, 'Toko'])->name('toko.admin');
    Route::post('/admin/toko/create', [StoreController::class, 'Store'])->name('toko.admin.store');
    Route::post('/admin/toko/update/{id}', [StoreController::class, 'Update'])->name('toko.admin.update');
    Route::get('/admin/toko/delete/{id}', [StoreController::class, 'Delete'])->name('toko.admin.delete');
});

Route::middleware(['member'])->group(function () {
    Route::get('/toko', [StoreController::class, 'Index'])->name('toko');
    Route::get('/toko/toko-member', [StoreController::class, 'TokoMember'])->name('toko.member');
    Route::post('/toko/create', [StoreController::class, 'TokoMemberCreate'])->name('toko.member.store');
    Route::get('/toko/detail/{id}', [StoreController::class, 'Detail'])->name('toko.detail');
});

Route::get('/login', [AuthController::class, 'Index'])->name('login');
Route::post('/login', [AuthController::class, 'Authentication'])->name('login.post');
Route::get('/logout', [AuthController::class, 'Logout'])->name('logout');
Route::get('/register', [AuthController::class, 'Register'])->name('register');
Route::post('/register', [AuthController::class, 'Regist'])->name('register.post');