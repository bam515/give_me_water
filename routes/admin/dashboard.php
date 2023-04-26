<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

Route::middleware('admin')->group(function () {
    // dashboard index
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
});
