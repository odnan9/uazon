<?php

use Illuminate\Database\Seeder;
use App\Database\libros;

class librosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 20; $i++) {
            libros::create([
                'precio' => $faker->randomFloat(2,1,30),
                'num_voto' => $faker->randomDigit(),
                'n_pags' => $faker->randomDigit(),
                'editorial' => $faker->text(32),
                'titulo' => $faker->text(64),
                'voto' => $faker->randomDigit(),
                'isbn' => $faker->randomAscii()
            ]);
        }
    }
}
