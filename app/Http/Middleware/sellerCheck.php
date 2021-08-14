<?php

namespace App\Http\Middleware;

use Closure;

class sellerCheck
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
        if(auth()->user()->is_seller){
            return $next($request);
        }else if(auth()->user()->is_admin){
            return redirect()->route('admin.index');
        }else{
            return redirect()->route('home');
        }
    }
}
