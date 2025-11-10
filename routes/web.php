<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, 'beranda'])->name('beranda');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
