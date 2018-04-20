<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $password = Hash::make('123456');
        $ciudades = App\Database\ciudades::all()->pluck('id')->toArray();

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@test.com',
            'password' => $password,
            'address' => $faker->address,
            'admin' => $faker->boolean,
            'cp' => $faker->postcode,
            'fk_ciudades' => $faker->randomElement($ciudades)
        ]);

        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
                'address' => $faker->address,
                'admin' => $faker->boolean,
                'cp' => $faker->postcode,
                'fk_ciudades' => $faker->randomElement($ciudades)
            ]);
        }
    }
}
