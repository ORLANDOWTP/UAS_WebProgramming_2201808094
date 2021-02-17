<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $roles=explode(':',$role);
        if(Auth::check()&&in_array(Auth::user()->role,$roles) ==$role)
            return $next($request);

        return abort(403);
    }
}
