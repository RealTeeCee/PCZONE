<?php

namespace App\Http\Middleware\user;

use Closure;
use Illuminate\Http\Request;

class CheckUserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!session('user_id')){
            return redirect('login')->with('error', 'Please login to continue');
        }else{
            return $next($request);
        }
    }
}
