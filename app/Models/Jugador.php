<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Jugador extends Model
{
    use HasFactory;

    protected $table = 'jugador';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $hidden = ['password'];

    public function movimientos(){
        return $this->hasMany(Movimiento::class);
    }

    public function juegoGanado(){
        return $this->hasMany(Juego::class, 'ganador_id');
    }
}