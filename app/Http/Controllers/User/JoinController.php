<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class JoinController extends Controller
{
    // sign-up form
    public function index() {
        return view('user.join.sign-up');
    }

    // sign-up
    public function store(Request $request) {
        DB::beginTransaction();

        try {
            User::create([
                'login_id' => $request->login_id,
                'password' => Hash::make($request->password),
                'user_birth' => date('Y-m-d', strtotime($request->birth)),
                'user_gender' => $request->gender,
                'nick_name' => $request->nick_name,
                'created_at' => now(),
                'updated_at' => null
            ]);
            $code = 200;
            $message = 'success';
            DB::commit();
        } catch (\Exception $exception) {
            $code = 500;
            $message = $exception->getMessage();
            DB::rollBack();
        }
        return response()->json(['code' => $code, 'message' => $message]);
    }
}
