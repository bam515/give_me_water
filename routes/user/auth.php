<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\JoinController;

// login form
Route::get('/login', [AuthController::class, 'loginForm'])->name('login-form');

// login






// sign-up form
Route::get('/sign-up', [JoinController::class, 'index'])->name('join.index');

// sign-up
Route::post('/sign-up', [JoinController::class, 'store'])->name('join.store');
