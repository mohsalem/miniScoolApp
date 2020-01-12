<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class userRoleMiddleware
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
        $role_type = Auth::user()->role_type;
        if( $role_type == $role)
        {
            return $next($request);
        }

        return response()->json(['error'=>'Unauthorised'], 401);

    }
}
