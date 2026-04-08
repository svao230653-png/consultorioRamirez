<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SesionMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('id')) {
            return redirect()->route('login')->with('warning', 'Debes iniciar sesión para acceder al sistema.');
        }

        return $next($request);
    }
}