<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificarSesion
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('id')) {
            return redirect('/login')->withErrors([
                'error' => 'Debes iniciar sesión para entrar al sistema.'
            ]);
        }

        return $next($request);
    }
}