<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        if (stripos(strval($request->user()), '"admin":"on"') == false)
        {
            return redirect('/goods');
        }

        return $next($request);
    }
}
