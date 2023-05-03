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
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
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

                if ($request->filled('remember')) {
                    setcookie('admin_login_id', $request->login_id, time() + 60 * 60 * 24 * 100);
                    setcookie('admin_login_pass', $request->password, time() + 60 * 60 * 24 * 100);
                } else {
                    setcookie('admin_login_id', $request->login_id, 100);
                    setcookie('admin_login_pass', $request->password, 100);
                }

                return redirect()->intended('/admin/dashboard');
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
