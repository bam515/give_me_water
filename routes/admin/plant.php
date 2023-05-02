<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PlantController;

Route::middleware('admin')->group(function () {
    // 화단 관리
    Route::get('/', [PlantController::class, 'index'])->name('admin.plant.index');

    // 상세보기
    Route::get('/detail/{plant}', [PlantController::class, 'show'])->name('admin.plant.show');

    // 삭제
    Route::delete('/{plant}', [PlantController::class, 'delete'])->name('admin.plant.delete');

    // excel download
    Route::get('/excel', [PlantController::class, 'excel'])->name('admin.plant.excel');
});
