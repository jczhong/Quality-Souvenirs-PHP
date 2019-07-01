<?php

namespace App\Http\Middleware;

use Closure;

class Adminstrator
{
    public function handle($request, Closure $next)
    {
        if (!$request->user()->isAdmin()) {
            return response('access denies', 403);
        }

        return $next($request);
    }
}
