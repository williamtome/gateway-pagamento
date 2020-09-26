<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Notebook HD 1TB, 500GB RAM Processador Intel Core I5 9º geração.',
            'brand' => 'Sony Vaio',
            'price' => 5990.00,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('products')->insert([
            'name' => 'Teclado Mecânico.',
            'brand' => 'Redragon',
            'price' => 249.90,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('products')->insert([
            'name' => 'Monitor 19 polegadas.',
            'brand' => 'Acer',
            'price' => 649.00,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
