<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(paisesTableSeeder::class);
        $this->call(ciudadesTableSeeder::class);
//        $this->call(UserTableSeeder::class);
        $this->call(librosTableSeeder::class);
    }
}
