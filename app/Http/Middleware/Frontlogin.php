<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class Frontlogin
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
        if(empty(Session::has('front_session')))
        {
           return redirect('user_login');
        }
        return $next($request);
    }
}
