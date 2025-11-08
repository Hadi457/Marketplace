<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, 'beranda'])->name('beranda');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
