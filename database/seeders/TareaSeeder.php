<?php

namespace Database\Seeders;

use App\Models\Tarea;
use App\Models\User;
use App\Models\Proyecto;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;

class TareaSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = FakerFactory::create('es_ES');
        $users = User::pluck('id'); // Obtener los IDs de todos los usuarios existentes
        $proyectos = Proyecto::pluck('id'); // Obtener los IDs de todos los proyectos existentes

        for ($i = 0; $i < 20; $i++) {
            Tarea::create([
                'descripcion' => $faker->sentence,
                'estado' => $faker->randomElement(['pendiente', 'en progreso', 'completada']),
                'user_id' => $faker->randomElement($users),
                'proyecto_id' => $faker->randomElement($proyectos),
                'fecha_limite' => $faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            ]);
        }
    }
}
