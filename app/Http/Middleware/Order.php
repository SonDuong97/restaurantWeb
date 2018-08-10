<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Order
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
        if (Auth::check()){
            if (strcmp(Auth::user()->email, "duongson29111997@gmail.com") == 0) {
                return redirect()->route('homePageAdmin');
            } else {
                return $next($request);    
            }
        } else {
            return redirect()->route('login')->with('notification', 'You need login.');
            // return "You need login";
            // echo "You need login";
        }
        
    }
}
