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
        $role_type = User::where('id', Auth::id())->pluck('role_type')->first();
        if( $role_type == $role)
        {
            return $next($request);
        }

        return response()->json(['error'=>'Unauthorised'], 401);

    }
}
