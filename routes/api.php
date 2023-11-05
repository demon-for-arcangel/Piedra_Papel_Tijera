<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\JuegoController;
use App\Http\Controllers\MovimientoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

// Rutas de Jugador
Route::get('/jugadores', [JugadorController::class, 'listaJugadores']);//Funciona
Route::get('/jugadores/{id}', [JugadorController::class, 'encontrarJugador']);//sin comprobacion
Route::post('/jugadores', [JugadorController::class, 'insertarJugador']);//No funciona
Route::delete('/jugadores/{id}', [JugadorController::class, 'eliminarJugador']);//Sin comprobacion

// Rutas de Juego
Route::post('/juegos', [JuegoController::class, 'iniciarJuego']);//sin comprobacion
Route::post('/juegos/{id}/movimientos', [JuegoController::class, 'hacerMovimiento']);//sin comprobacion
Route::get('/juegos/{id}/ganador', [JuegoController::class, 'determinarGanador']);//Sin comprobacion

// Rutas de Movimiento
Route::get('/movimientos', function (){ //Funciona
    $movimientos = ['piedra', 'papel', 'tijera'];
    return response()->json($movimientos, 200);
});

//Middleware
Route::middleware('auth.jugador')->group(function () {
    Route::get('/perfil', [JugadorController::class, 'mostrarPerfil']);
});