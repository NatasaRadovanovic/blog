<?php

namespace App\Http\Middleware;

use Closure;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) //u karnel.php dodajemo
    {
        if($request->get('age') < 12)
        {
            return response(view('auth.forbidden-under-12')); //response je helper
        }
        return $next($request);
    }
}
