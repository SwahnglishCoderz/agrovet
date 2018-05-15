<?php

namespace App\Http\Middleware;

use Sentinel;
use Closure;

class VisitorMiddleWare
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
        if (!Sentinel::check())
            return $next($request);
        else
        {
            if(Sentinel::getUser()->roles()->first()->slug == 'admin')
            {
                return redirect('/admin');
            }
            else if(Sentinel::getUser()->roles()->first()->slug == 'operator')
            {
                return redirect('/operator');
            }
            
        }
    }
}
