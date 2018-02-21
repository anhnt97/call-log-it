<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\LoginRequest;
use App\PasswordReset;
use App\User;
use Carbon\Carbon;
use Hash;

class ResetPasswordController extends Controller {
	public function showResetForm($token) {
		// check token co hop le hay khong
		$pwdReset = PasswordReset::where('token', $token)->first();
		if ($pwdReset) {
			$thatDay = Carbon::createFromFormat('Y-m-d H:i:s', $pwdReset->created_at);
			$now = Carbon::now();
			$dif = $now->diffInHours($thatDay);
			if ($dif > 24) {
				DB::table('password_resets')->where('token', $token)->delete();
				return "error! invalid token";
			}
			return view('account.password.reset', compact('token'));

		} else {
			return "error! invalid token";
		}

	}

	public function reset(LoginRequest $request) {
		// dd($request);
		$pwdReset = PasswordReset::where('token', $request->token)->first();
		if ($pwdReset) {
			$thatDay = Carbon::createFromFormat('Y-m-d H:i:s', $pwdReset->created_at);
			$now = Carbon::now();
			$dif = $now->diffInHours($thatDay);
			if ($dif > 24) {
				DB::table('password_resets')->where('token', $token)->delete();
				return "error! invalid token";
			}
			$user = User::where('email', $pwdReset->email)->first();
			$user->password = Hash::make($request->password);
			$user->save();
			$pwdReset = PasswordReset::where('email', $pwdReset->email)->delete();
			return redirect(route('login'));
		} else {
			return "error! invalid token";
		}
	}
}
