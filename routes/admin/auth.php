<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;

// login form
Route::get('/login', [AuthController::class, 'loginForm'])->name('admin.login-form');

// login
Route::post('/login', [AuthController::class, 'login'])->name('admin.login');

// logout
Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
