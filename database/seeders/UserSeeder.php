<?php

namespace Database\Seeders;

use Faker\Factory as FakerFactory;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = FakerFactory::create('es_ES'); // Reemplaza 'es_ES' por el idioma deseado
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('password'),
                'admin' => false,
                'tareas_realiz' => 0,
            ]);
        }
    }
}
