<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;

class AllowLoginRegister
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('login') || $request->is('register')) {
            return $next($request);
        }

        return app(RedirectIfAuthenticated::class)->handle(
            $request,
            $next
        );
    }
}