<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class index
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if (strcmp(Auth::user()->email, "duongson29111997@gmail.com") == 0) {
                return redirect()->route('showListProduct');
            }
        }
        return $next($request);
    }
}
