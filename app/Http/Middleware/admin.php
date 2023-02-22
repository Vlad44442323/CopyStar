<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class admin
{
    public function handle($request, Closure $next)
    {
	if (Auth::check() && Auth::user()->role == 'admin') {
            return $next($request);
        }
        	abort(403);
}
}