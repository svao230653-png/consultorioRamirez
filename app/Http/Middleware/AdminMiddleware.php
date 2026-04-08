<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (session('rol') !== 'administrador') {
            return redirect()->route('panel')->with('error', 'No tienes permisos para entrar a esta sección.');
        }

        return $next($request);
    }
}