<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->isAdmin()) {
            return $next($request);
        }
        return redirect('/home');
    }
}