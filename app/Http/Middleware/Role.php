<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {
              // Check if the authenticated user has the required role
              if (Auth::check() && Auth::user()->user_role === $role) {
                return $next($request);
            }
            

            // If the user does not have the required role, abort with 403 Forbidden response
            abort(403, 'You do not have permission to access this page.');

        return $next($request);
    }
}
