<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    public function jugador(){
        return $this->belongsTo(Jugador::class);
    }

    public function juego(){
        return $this->belongTo(Juego::class);
    }
}
