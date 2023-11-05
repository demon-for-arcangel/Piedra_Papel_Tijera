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
Route::get('/jugadores', [JugadorController::class, 'listaJugadores']);
Route::get('/jugadores/{id}', [JugadorController::class, 'encontrarJugador']);
Route::post('/jugadores', [JugadorController::class, 'insertarJugador']);
Route::delete('/jugadores/{id}', [JugadorController::class, 'eliminarJugador']);

// Rutas de Juego
Route::post('/juegos', [JuegoController::class, 'iniciarJuego']);
Route::post('/juegos/{id}/movimientos', [JuegoController::class, 'hacerMovimiento']);
Route::get('/juegos/{id}/ganador', [JuegoController::class, 'determinarGanador']);

// Rutas de Movimiento
Route::get('/movimientos', [MovimientoController::class, 'listaMovimientos']);

//Middleware
Route::middleware('auth.jugador')->group(function () {
    Route::get('/perfil', [JugadorController::class, 'mostrarPerfil']);
});
