<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuarioId', 'eleccionUsuario', 'eleccionMaquina', 'ganador',
    ];

    public function usuario(){
        return $this -> belongsTo(Usuario::class);
    }

    public function jugar(){
        return $this -> hasMany(Juego::class);
    }
}