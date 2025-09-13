<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string|null  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, ?string $role = null): Response
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to access this area.');
        }

        $user = Auth::user();
        
        // Check if user has the required role
        if ($role === 'superadmin') {
            if ($user->role !== User::ROLE_SUPERADMIN) {
                abort(403, 'Access denied. Super Admin privileges required.');
            }
        } 
        // Check if user is admin for all other admin routes
        else if (!in_array($user->role, [User::ROLE_ADMIN, User::ROLE_SUPERADMIN])) {
            abort(403, 'Access denied. Admin privileges required.');
        }

        return $next($request);
    }
}
