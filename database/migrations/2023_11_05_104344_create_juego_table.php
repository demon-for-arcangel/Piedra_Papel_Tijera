<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('juego', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jugador_id')->nullable()->constrained('jugador');
            $table->boolean('ganada')->default(false);
            $table->enum('movimiento', ['piedra', 'papel', 'tijera']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('juego');
    }
};
