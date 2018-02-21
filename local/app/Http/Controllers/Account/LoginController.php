<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
	// Hiển thị form đăng nhập
	public function showLoginForm() {
		return view('account.login');
	}
	// Đăng nhập
	public function login(LoginRequest $request) {
		if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)
		) {
			return redirect(route('homepage'));
		} else {
			return back()->with('msg', 'Sai tài khoản/mật khẩu');
		}
	}
	// Đăng nhập
	public function logout() {
		Auth::logout();
		return redirect(route('login'));
	}
}
