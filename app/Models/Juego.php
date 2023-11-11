<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    public function ganador(){
        return $this->belongsTo(Player::class, 'ganador_id');
    }

    public function movimientos(){
        return $this->hasMany(Movimiento::class);
    }
}
