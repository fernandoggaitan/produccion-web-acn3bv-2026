<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {

        //Si el usuario no tiene ese rol. Se redirecciona.
        if (! $request->user()->hasRole($role)) {
            return redirect()->route('dashboard');
        }

        return $next($request);

    }
}
