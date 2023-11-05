<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movimiento;

class MovimientoController extends Controller
{
    public static function hacerMovimiento(Request $request){
        $movimiento = new Movimiento();

        $movimiento->jugador_id = $request->get('jugador_id');
        $movimiento->tipo = $request->get('tipo');

        // Validar que el tipo sea uno de los movimientos permitidos
        if (!in_array($movimiento->tipo, ['piedra', 'papel', 'tijera'])) {
            return response()->json("El tipo de movimiento no es válido.", 400);
        }

        try {
            $movimiento->save();
            return response()->json("Movimiento realizado", 200);
        } catch (\Exception $e) {
            return response()->json("No se ha podido realizar el movimiento", 500);
        }
    }
}
