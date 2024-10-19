<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class StatusMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $status): Response
    {
        $allowedStatuses = explode('|', $status);
        if (!Auth::check() || !in_array(Auth::user()->status, $allowedStatuses)) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
