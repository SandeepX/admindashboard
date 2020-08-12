<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class admin
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
        if($request->user()->role =='admin'){
            return $next($request);
        }else{
            
            return redirect()->route($request->user()->role);

        }
    }
}
