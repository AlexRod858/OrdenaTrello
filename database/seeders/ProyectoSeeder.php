<?php

namespace Database\Seeders;

use App\Models\Proyecto;
use App\Models\User;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;

class ProyectoSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = FakerFactory::create('es_ES');
        $users = User::where('admin', true)->pluck('id');; // Obtener los IDs de todos los usuarios existentes

        for ($i = 0; $i < 20; $i++) {
            Proyecto::create([
                'titulo' => $faker->sentence,
                'user_id' => $faker->randomElement($users),
                'descripcion' => $faker->sentence,
            ]);
        }
    }
}
