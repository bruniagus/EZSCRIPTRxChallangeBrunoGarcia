<?php

use App\{Libro,Autor,Inventario};
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class LibrosTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 10; $i++) {
            $autor = Autor::create([
                'nombre' => $faker->firstName,
                'apellido' => $faker->lastName,
            ]);

            for ($y = 1; $y <= 3; $y++) {
                $libro = Libro::create([
                    'titulo' => $faker->name,
                    'autor_id' => $autor->id,
                ]);
                $cant = $faker->randomElement([0, 1, 2, 3]);
                Inventario::create([
                    'libro_id' => $libro->id,
                    'total_ejemplares' => $cant,
                    'ejemplares_disponibles' => $cant,
                ]);
            }
        }
    }
}