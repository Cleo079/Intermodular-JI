<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EsFeriante
{
    public function handle($request, Closure $next)
    {
        // Verifica si el usuario está autenticado y si tiene el rol 'feriante'
        if (Auth::check() && Auth::user()->rol === 'feriante') {
            return $next($request);
        }

        // Si no tiene el rol de feriante, redirige al inicio o a otra página
        return redirect('/')->with('error', 'No tienes permiso para acceder a esta sección.');
    }
}
