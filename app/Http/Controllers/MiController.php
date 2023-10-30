<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juego;
use App\Models\Usuario;

class MiController extends Controller
{
    public function empezarJuego(Request $request){
        //verificar si el usuario ya tiene una partida abierta
        $usuario_id = $request -> input('usuario_id');
        //la funcion first es un método de Laravel que se utiliza para recuperar el primer registro que cumpla con las condiciones especificadas en la consulta.
        $existeJuego = Juego::where('usuario_id', $usuario_id) -> whereNull('Ganador')->first(); 

        if ($existeJuego){
            return response()->json(['message' => 'Ya tienes una partida abierta.'], 400);
        }

        //Crear una nueva partida
        $juego = new Juego();
        $juego -> usuario_id = $usuario_id;
        $juego -> save();

        return response() -> json(['message' => 'Partida iniciada.', 'juego_id' => $juego -> id]);
    }

    public function getUsuarioInfo($id){
        $usuario = Usuario::find($id);

        if (!$usuario){
            return response() -> json(['message' => 'Usuario no encontrado.'], 404);
        }

        //Limitar la información del usuario para solo mostrar sus datos
        return response() -> json(['nombre' => $usuario -> nombre, 'email' => $usuario -> email]);
    }

    public function jugar(Request $request){
        $juegoId = $request -> input('juego_id');
        $eleccionUsuario = $request -> input('eleccion');

        $juego = Juego::find($juegoId);

        if (!$juego){
            return response() -> json(['message' => 'Partida no encontrada.']);
        }

        if ($juego -> ganado){
            return response() -> json(['message' => 'La partida ya ha terminado.']);
        }

        //Validar la elección del usuario (piedra, papel o tijera)
        if (!in_array($eleccionUsuario, ['piedra', 'papel', 'tijera'])){
            return response() -> json (['message' => 'La elección no es válida.'], 400);
        }

        //Generar la elección de la máquina de forma aleatoria
        $eleccionPosible = ['piedra', 'papel', 'tijera'];
        $eleccionMaquina = array_rand($eleccionPosible);

        //Determinar el ganador
        if ($eleccionUsuario == $eleccionMaquina){
            $ganador = 'Empate';
        } else if (($eleccionUsuario == 'piedra' && $eleccionMaquina == 'tijera') || ($eleccionUsuario == 'tijera' && $eleccionMaquina == 'papel') || ($eleccionUsuario == 'papel' && $eleccionMaquina == 'piedra')) {
            $ganador = $juego -> usuario_id;
        } else {
            $ganador = 'Máquina';
        }

        //Actualizar el estado de la partida
        $juego -> eleccionUsuario = $eleccionUsuario;
        $juego -> eleccionMaquina = $eleccionMaquina;
        $juego -> ganador = $ganador;
        $juego -> save();

        return response() -> json(['message' => 'Jugada realizada.', 'ganador' => $ganador]);
    }
}