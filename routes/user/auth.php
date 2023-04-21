<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AuthController;

// login form
Route::get('/login', [AuthController::class, 'loginForm'])->name('login-form');

// login
