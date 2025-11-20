<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Symfony\Component\HttpFoundation\Response;

class Authenticate extends Middleware
{
    /**
     *  Redirect when the user is not logged in
     */
    protected function redirectTo($request): ?string
    {
        // when there is an API CALL then dont redirect but give 401 back
        if ($request->expectsJson()) {
            return null;
        }

        // redirect us to the page log in otherwise
        return route('login');
    }
}
