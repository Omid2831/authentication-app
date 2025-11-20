<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = Auth::user();

        if(!$user) return  redirect()->route('login');

        $userRole = strtolower($user->role ?? '');

        if(!in_array($userRole, $roles,  true)){
            abort(Response::HTTP_FORBIDDEN, 'Not Permissable');
        }
        
        return $next($request);
    }
}
