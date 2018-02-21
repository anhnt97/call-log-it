<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class isTeamLeader {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		if (Auth::user()->role == 300 || Auth::user()->role == 500) {
			return $next($request);
		}
		return redirect()->route('logout');
	}
}
