<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
class UserExport implements FromView
{
    public function view(): View {
        return view('admin.excel.member', [
            'members' => User::latest()->get()
        ]);
    }
}
