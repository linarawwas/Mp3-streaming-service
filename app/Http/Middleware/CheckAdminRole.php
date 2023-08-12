<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdminRole
{
    public function handle($request, Closure $next)
    {
        if (auth()->user() && auth()->user()->isAdmin()) {
            return $next($request);
        }

        return response()->json(['error' => 'Unauthorized'], 403);
    }
}