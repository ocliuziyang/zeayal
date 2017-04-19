<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthApi
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

        if (Auth::user() && Auth::user()->is_admin) {
            return $next($request);
        }

        return response()->json([
            'status' => 0,
            'message' => '权限认证失败! 请确定已经登陆'
        ]);

    }
}
