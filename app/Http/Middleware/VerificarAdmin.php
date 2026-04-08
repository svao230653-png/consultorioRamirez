<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificarAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (session('rol') !== 'administrador') {
            return redirect('/panel')->withErrors([
                'error' => 'No tienes permisos para acceder a esta sección.'
            ]);
        }

        return $next($request);
    }
}