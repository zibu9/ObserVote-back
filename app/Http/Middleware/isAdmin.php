<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->role->role === 'Admin')
        {
            return $next($request);
        }
        return abort(403);
    }
}
