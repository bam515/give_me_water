<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use App\Models\Plant;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // dashboard index
    public function index(Request $request) {
        // 회원 수
        $memberCount = User::count();
        // 화분 수
        $plantCount = Plant::count();
        // 공지사항 수
        $noticeCount = Notice::count();

        return view('admin.dashboard.index',
            compact('memberCount', 'plantCount', 'noticeCount'));
    }
}
