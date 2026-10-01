<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(
        Request $request,
        Closure $next,
        ...$roles
    ): Response {
        $user = $request->user();

        // User logged in nahi hai
        if (!$user) {
            abort(401);
        }

        // User ka role allowed roles mein nahi hai
        if (!in_array($user->role, $roles, true)) {
            abort(403);
        }

        return $next($request);
    }
}