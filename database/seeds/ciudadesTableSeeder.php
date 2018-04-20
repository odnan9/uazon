<?php

use Illuminate\Database\Seeder;
use App\Database\ciudades;

class ciudadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $paises = App\Database\paises::all()->pluck('id')->toArray();

        for ($i = 0; $i < 1000; $i++) {
            ciudades::create([
                'nombre' => substr($faker->city(),0,45),
                'fk_paises' => $faker->randomElement($paises),
                'region' => $faker->text(45),
            ]);
        }
    }
}
