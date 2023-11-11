<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juego;

class JuegoController extends Controller
{
    public function insertarJuego(Request $request){
        $juego = new Juego();

        $juego->id = $request->get('id');
        $juego->nombre = $request->get('nombre');

        try{
            $juego->save();
            return response()->json("Juego insertado", 200);
        }catch (\Exception $e){
            return response()->json("No se ha podido insertar el juego", 500);
        }
    }

    public function listarJuegos(){
        $juegos = Juego::all();
        return response()->json($juegos, 200);
    }

    public function encontrarJuego($id){
        $juego = Juego::find($id);

        if ($juego == null){
            return response()->json("No existe el juego que se busca.", 404);
        }else{
            return response()->json($juego, 200);
        }
    }

    public function eliminarJuego($id){
        $juego = Juego::find($id);

        if ($juego == null){
            try{
                $juego->delete();
                return response()->json("Juego eliminad", 200);
            }catch(\Exception $e){
                return response()->json("No se ha podido eliminar el juego deseado", 500);
            }
        }else{
            return response()->json("No existe el juego que desea eliminar.", 404);
        }
    }

    public function iniciarJuego($id){
        $juego = Juego::find($id);

        if ($juego == null){
            return response()->json("No existe el juego", 404);
        }else{
            $juego->save();

            return response()->json("Juego iniciado", 200);
        }
    }

    public function hacerMovimiento($id){
        $juego = Juego::find($id);

        if ($juego == null){
            return response()->json("No existe el juego que se busca.", 404);
        }else{
            $juego->save();

            return response()->json("Movimiento realizado", 200);
        }
    }

    public function determinarGanador($id){
        $juego = Juego::find($id);

        if ($juego == null){
            return response()->json("No existe el juego que se busca.", 404);
        }else{
            $jugador = $juego->jugador; // Obtener el jugador asociado al juego

            if ($jugador == null) {
                return response()->json("No hay jugador asociado a este juego.", 404);
            }

            $nombreJugador = $jugador->nombre; // Obtener el nombre del jugador

            return response()->json("El ganador es: " . $nombreJugador, 200);
        }
    }
}
