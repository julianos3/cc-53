<?php

namespace CentralCondo\Http\Middleware;

use Auth;
use Closure;

class AdminRedirectlAuthenticated
{
    /**
     * @param $request
     * @param Closure $next
     * @param string $guard
     * @return \Illuminate\Contracts\Routing\ResponseFactory|mixed|\Symfony\Component\HttpFoundation\Response
     */
    public function handle($request, Closure $next, $guard = 'admin_user')
    {
        if (!Auth::guard($guard)->check()) {
            //return response("Access denied", 403);
            abort();
        }
        return $next($request);
    }
}
