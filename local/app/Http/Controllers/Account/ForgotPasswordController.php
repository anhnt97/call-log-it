<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\LoginRequest;
use App\PasswordReset;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller {
	public function sendResetLinkEmail(LoginRequest $request) {
		$email = $request->email;
		$user = User::where('email', $email)->first();
		if ($user) {
			$pwdReset = PasswordReset::where('email', $request->email)->delete();
			$token = str_random(32);
			$now = Carbon::now();
			$pwdReset = new PasswordReset();
			$pwdReset->email = $request->email;
			$pwdReset->token = $token;
			$pwdReset->created_at = $now;
			// dd($pwdReset);
			$pwdReset->save();

			$url = url('/mat-khau/khoi-phuc/' . $token);
			// dd($url);
			// send email
			Mail::send('mail_template.reset-password-mail', compact('url', 'user'), function ($message) use ($user) {
				$message->to($user->email, $user->name);
				$message->subject('Yêu cầu cấp lại mật khẩu');
			});
			return redirect()->back()->withSuccess('Kiểm tra thư của bạn');
		} else {
			dd('not-found-user');
		}
	}

}
