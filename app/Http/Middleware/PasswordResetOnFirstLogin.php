<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;

class PasswordResetOnFirstLogin {

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        try {
            if ( !is_null($request->user()) && !$request->user()->last_login) {
                return redirect(route('password.reset'));
            }
        } catch (Exception $exception) {
            logger($exception);
        }

        return $next($request);
    }
}
