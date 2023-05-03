<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UserExport;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class MemberController extends Controller
{
    // member management index
    public function index(Request $request) {
        $request->flash();

        $members = User::select('*');

        if ($request->filled('keyword')) {
            $keyword = '%' . $request->keyword . '%';
            $members->where('login_id', 'like', $keyword)
                ->orWhere('nick_name', 'like', $keyword);
        }

        if ($request->filled('order')) {
            $members->latest($request->order);
        }

        $members->latest('user_id');

        if ($request->filled('post')) {
            $members = $members->paginate($request->post);
        } else {
            $members = $members->paginate(10);
        }

        return view('admin.member.index', compact('members'));
    }

    // block member
    public function blockMember(User $user) {
        DB::beginTransaction();

        try {
            $user->update([
                'status' => 1,
                'updated_at' => now()
            ]);
            $code = 200;
            $message = 'success';
            DB::commit();
        } catch (\Exception $exception) {
            $code = 500;
            $message = $exception->getMessage();
            DB::rollBack();
        }
        return response()->json([
            'code' => $code,
            'message' => $message
        ]);
    }

    // delete member
    public function delete(User $user) {
        DB::beginTransaction();

        try {
            $user->delete();

            $code = 200;
            $message = 'success';
            DB::commit();
        } catch (\Exception $exception) {
            $code = 500;
            $message = $exception->getMessage();
            DB::rollBack();
        }
        return response()->json([
            'code' => $code,
            'message' => $message
        ]);
    }

    // excel download
    public function excel() {
        return Excel::download(new UserExport(), '회원관리_' . date('Y-m-d') . '.xlsx');
    }
}
