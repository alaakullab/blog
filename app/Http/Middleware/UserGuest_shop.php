<?php

namespace App\Http\Middleware;

use Closure;

class UserGuest_shop {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = null) {
		if (!auth()->user()) {
			return redirect('/E-commerce/register');
		}
		return $next($request);

	}
}
