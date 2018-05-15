<?php

namespace App\Http\Middleware;

use Sentinel;
use Closure;

class OperatorMiddleWare
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
        if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'operator')
            return $next($request);
        else
            return redirect('/not-allowed');
    }
}
