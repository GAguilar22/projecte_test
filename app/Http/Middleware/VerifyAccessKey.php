<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyAccessKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Si és un GET, no fem cap comprovació
        if ($request->isMethod('get')) {
            return $next($request);
        }
        
        // Obtenim l’API-KEY que envia l’usuari
        $key = $request->headers->get('api-key');
        // Comprovem si coincideix amb en valor desat a la nostra aplicació
        if (isset($key) && $key == env('API_KEY')) {
            return $next($request);
        } else {
            // Si falla retornem un error en format JSON
            return response()->json(['error' => 'unauthorized' ], 401);
        }
    }
}