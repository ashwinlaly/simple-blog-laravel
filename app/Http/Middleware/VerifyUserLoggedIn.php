<?php

namespace App\Http\Middleware;

use Closure;

class VerifyUserLoggedIn
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
        if (session()->get('loggedIn') == 1) {
            return $next($request);   
        } else {
            return redirect('/');
        }
    }
}
