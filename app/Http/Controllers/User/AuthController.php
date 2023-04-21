<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // login form
    public function loginForm() {
        return view('user.login.login');
    }

    // login
    public function login(Request $request) {
        $user = User::where('login_id', '=', $request->login_id)->first();
    }

    // logout
    public function logout() {
        Auth::guard('web')->logout();
        return redirect()->route('login-form');
    }
}
