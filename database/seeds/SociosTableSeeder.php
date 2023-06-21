<?php

use App\Socio;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class SociosTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 10; $i++) {
            Socio::create([
                'numero_socio' => $i,
                'nombre' => $faker->firstName,
                'apellido' => $faker->lastName,
                'telefono' => $faker->phoneNumber,
                'limite_prestamos' => $faker->randomElement([0, 1, 2, 3]),
                'activo' => $faker->boolean,
            ]);
        }
        
    }
}
