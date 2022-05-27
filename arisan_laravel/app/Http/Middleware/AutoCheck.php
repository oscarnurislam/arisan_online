<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AutoCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
       if (!session()->has('LoggedUser')) {
           return redirect()->route('auth.login')->with('fail', 'anda harus login terlebih dahulu');
       }
       return $next($request);
    }
}
