<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Jugador;
use Symfony\Component\HttpFoundation\Response;

class AuthJugadorMiddleware
{
    public function handle(Request $request, Closure $next){
        $id = $request->header('Jugador-ID');

        $jugador = Jugador::find($id);

        if (!$jugador){
            return response()->json(['message' => 'Jugador no autentificado'], 400);
        }

        return $next($request);
    }
}
