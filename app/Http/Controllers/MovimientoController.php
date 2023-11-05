<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movimiento;

class MovimientoController extends Controller
{
    public static function hacerMovimiento(Request $request){
        $jugador_id = $request->input('jugador_id');
        $movimiento = $request->input('tipo');

        //Registrar el movimiento del jugador
        $eleccion_jugador = new Movimiento();
        $eleccion_jugador->jugador_id = $jugador_id;
        $eleccion_jugador->movimiento = $movimiento;
        $eleccion_jugador->save();

        //La máquina realizara su movimiento
        $movimientos_validos = ['piedra', 'papel', 'tijera'];
        $movimientos_maquina = $movimientos_validos[array_rand($movimientos_validos)];

        //Registrar el movimiento de la máquina
        $movimiento_maquina_obj = new Movimiento();
        $movimiento_maquina_obj->jugador_id = 0; //Id para la máquina
        $movimiento_maquina_obj->tipo = $movimientos_maquina;
        $movimiento_maquina_obj->save();

        //Determinar el ganador
        $ganador = null;

        if ($movimiento == $movimientos_maquina){
            $ganador = 'empate';
        }else if(($movimiento == 'piedra' && $movimientos_maquina == 'tijera') || ($movimiento == 'tijera' && $movimientos_maquina == 'papel') || ($movimiento == 'papel') && $movimientos_maquina == 'piedra') {
            $ganador = 'jugador';
        }else{
            $ganador = 'maquina';
        }

        //Retorna la respuesta
        return response()->json([
            'jugador_id' => $jugador_id,
            'eleccion_jugador' => $movimiento,
            'eleccion_maquina' => $movimientos_maquina,
            'ganador' => $ganador 
        ], 200);
    }
}