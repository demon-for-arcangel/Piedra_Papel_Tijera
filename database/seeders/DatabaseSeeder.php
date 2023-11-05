<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('jugador')->insert([
                'nombre' => $faker->name,
                'password' => $faker->passsword(8, 12),
                'partidasJugadas' => $faker->numberBetween(1, 100),
                'partidasGanadas' => $faker->numberBetween(1, 50),
                'rol' => $faker->randomElement(['admin', 'usuario']),
            ]);
        }
    }

    public function calcularPuntuacion($id) {
        $jugador = DB::table('jugador')->where('id', $id)->first();
        $puntuacion = $jugador->partidasGanadas * 10; // Suponiendo que cada partida ganada da 10 puntos
    
        return response()->json(['puntuacion' => $puntuacion], 200);
    }
}
