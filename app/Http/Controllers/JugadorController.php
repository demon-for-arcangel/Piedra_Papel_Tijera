<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jugador;

class JugadorController extends Controller
{
    public static function insertarJugador(Request $request){
        $jugador = new Jugador();

        $jugador->id = $request->get('id');
        $jugador->nombre = $request->get('nombre');
        $jugador->password = $request->get('password');
        $jugador->partidasJugadas = $request->get('partidasJugadas');
        $jugador->partidasGanadas = $request->get('partidasGanadas');
        $jugador->rol = $request->get('rol');

        try {
            $jugador->save();
            return response()->json("Jugador insertado", 200);
        } catch (\Exception $e) {
            return response()->json("No se ha podido insertar el jugador", 500);
        }
    }


    public function listaJugadores(){
        $jugadores = Jugador::all();
        return response()->json($jugadores, 200);
    }

    public function encontrarJugador($id){
        $jugador = Jugador::find($id);

        if ($jugador == null){
            return response()->json("No existe el jugador que se busca.", 404);
        }else{
            return response()->json($jugador, 200);
        }
    }

    public function eliminarJugador($id){
        $jugador = Jugador::find($id);
    
        if ($jugador == null){
            return response()->json("No existe el jugador que se desea eliminar.", 404);
        } else {
            try{
                $jugador->delete();
                return response()->json("Jugador eliminado", 200);
            } catch (\Exception $e) {
                return response()->json("No se ha podido eliminar el jugador deseado", 500);
            }
        }
    }
}