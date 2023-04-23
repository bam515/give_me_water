<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // login form
    public function loginForm() {
        return view('user.login.login');
    }

    // login
    public function login(Request $request) {
        $user = User::where('login_id', '=', $request->login_id)->first();
        if ($user != null) {
            if (Hash::check($request->password, $user->password)) {
                Auth::guard('web')->login($user);
            }
            return back()->withErrors(['password' => '비밀번호가 일치하지 않습니다.']);
        }
        return back()->withErrors(['login_id' => '일치하는 계정정보가 없습니다.']);
    }

    // logout
    public function logout() {
        Auth::guard('web')->logout();
        return redirect()->route('login-form');
    }
}
