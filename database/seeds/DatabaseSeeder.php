<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountryTableSeeder::class);
        $this->call(StateTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(StatusPagseguroTableSeeder::class);
    }
}
