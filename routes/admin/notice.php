<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NoticeController;

Route::middleware('admin')->group(function () {
    // 공지사항 관리
    Route::get('/', [NoticeController::class, 'index'])->name('admin.notice.index');

    // 공지사항 작성
    Route::get('/create', [NoticeController::class, 'create'])->name('admin.notice.create');

    // 공지사항 저장
    Route::post('/', [NoticeController::class, 'store'])->name('admin.notice.store');

    // 공지사항 보기
    Route::get('/detail/{notice}', [NoticeController::class, 'show'])->name('admin.notice.show');

    // 공지사항 수정 폼
    Route::get('/edit/{notice}', [NoticeController::class, 'edit'])->name('admin.notice.edit');

    // 공지사항 수정
    Route::put('/{notice}', [NoticeController::class, 'update'])->name('admin.notice.update');

    // 공지사항 삭제
    Route::delete('/{notice}', [NoticeController::class, 'delete'])->name('admin.notice.delete');
});
