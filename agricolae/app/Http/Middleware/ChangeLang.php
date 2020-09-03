<?php

//Author: Santiago Pulgarin

namespace App\Http\Middleware;

use Closure;

class ChangeLang
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
        
        if(!empty(session('lang'))) 
        {

            app()->setlocale(session('lang'));
        
        }

        return $next($request);
        
    }
}
