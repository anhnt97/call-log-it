<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class isMember {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		if (Auth::user()->role >= 100) {
			return $next($request);
		}
		return redirect()->route('logout');
	}
}
