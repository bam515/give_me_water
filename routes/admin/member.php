<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MemberController;

Route::middleware('admin')->group(function () {
    // member management list
    Route::get('/', [MemberController::class, 'index'])->name('admin.member.index');

    // block member
    Route::put('/block/{user}', [MemberController::class, 'blockMember'])->name('admin.member.block');
});
