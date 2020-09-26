<?php

use Illuminate\Database\Seeder;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
            'name' => 'AC',
            'country_id' => 1,
        ]);

        DB::table('states')->insert([
            'name' => 'AL',
            'country_id' => 1,
        ]);

        DB::table('states')->insert([
            'name' => 'AM',
            'country_id' => 1,
        ]);

        DB::table('states')->insert([
            'name' => 'AP',
            'country_id' => 1,
        ]);

        DB::table('states')->insert([
            'name' => 'BA',
            'country_id' => 1,
        ]);

        DB::table('states')->insert([
            'name' => 'CE',
            'country_id' => 1,
        ]);

        DB::table('states')->insert([
            'name' => 'DF',
            'country_id' => 1,
        ]);

        DB::table('states')->insert([
            'name' => 'ES',
            'country_id' => 1,
        ]);

        DB::table('states')->insert([
            'name' => 'GO',
            'country_id' => 1,
        ]);

        DB::table('states')->insert([
            'name' => 'MA',
            'country_id' => 1,
        ]);

        DB::table('states')->insert([
            'name' => 'MT',
            'country_id' => 1,
        ]);

        DB::table('states')->insert([
            'name' => 'MS',
            'country_id' => 1,
        ]);

        DB::table('states')->insert([
            'name' => 'MG',
            'country_id' => 1,
        ]);

        DB::table('states')->insert([
            'name' => 'PA',
            'country_id' => 1,
        ]);

        DB::table('states')->insert([
            'name' => 'PB',
            'country_id' => 1,
        ]);

        DB::table('states')->insert([
            'name' => 'PR',
            'country_id' => 1,
        ]);

        DB::table('states')->insert([
            'name' => 'PE',
            'country_id' => 1,
        ]);

        DB::table('states')->insert([
            'name' => 'PI',
            'country_id' => 1,
        ]);

        DB::table('states')->insert([
            'name' => 'RJ',
            'country_id' => 1,
        ]);

        DB::table('states')->insert([
            'name' => 'RN',
            'country_id' => 1,
        ]);

        DB::table('states')->insert([
            'name' => 'RS',
            'country_id' => 1,
        ]);

        DB::table('states')->insert([
            'name' => 'RO',
            'country_id' => 1,
        ]);

        DB::table('states')->insert([
            'name' => 'RR',
            'country_id' => 1,
        ]);

        DB::table('states')->insert([
            'name' => 'SC',
            'country_id' => 1,
        ]);

        DB::table('states')->insert([
            'name' => 'SP',
            'country_id' => 1,
        ]);

        DB::table('states')->insert([
            'name' => 'SE',
            'country_id' => 1,
        ]);

        DB::table('states')->insert([
            'name' => 'TO',
            'country_id' => 1,
        ]);
    }
}
