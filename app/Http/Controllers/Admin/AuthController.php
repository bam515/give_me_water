<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // login form
    public function loginForm() {
        return view('admin.login.index');
    }

    // login
    public function login(Request $request) {
        $loginID = $request->login_id;
        $password = $request->password;

        $admin = Admin::where('login_id', '=', $loginID)->first();

        if ($admin !== null) {
            if (Hash::check($password, $admin->password)) {
                Auth::guard('admin')->login($admin);
                return redirect()->intended('/admin/member');
            } else {
                return back()->withErrors(['password' => '비밀번호가 일치하지 않습니다.']);
            }
        } else {
            return back()->withErrors(['login_id' => '일치하는 계정 정보가 없습니다.']);
        }
    }

    // logout
    public function logout() {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login-form');
    }
}
