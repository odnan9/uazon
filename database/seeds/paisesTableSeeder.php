<?php

use Illuminate\Database\Seeder;
use App\Database\paises;

class paisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 350; $i++) {
            paises::create([
                'nombre' => substr($faker->country(),0,45),
            ]);
        }
    }
}
