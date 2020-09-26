<?php

use Illuminate\Database\Seeder;

class StatusPagseguroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_pagseguros')->insert([
            'name' => 'Aguardando Pagamento',
        ]);

        DB::table('status_pagseguros')->insert([
            'name' => 'Em análise',
        ]);

        DB::table('status_pagseguros')->insert([
            'name' => 'Paga',
        ]);

        DB::table('status_pagseguros')->insert([
            'name' => 'Disponível',
        ]);

        DB::table('status_pagseguros')->insert([
            'name' => 'Em disputa',
        ]);

        DB::table('status_pagseguros')->insert([
            'name' => 'Devolvida',
        ]);

        DB::table('status_pagseguros')->insert([
            'name' => 'Cancelada',
        ]);

        DB::table('status_pagseguros')->insert([
            'name' => 'Debitado',
        ]);

        DB::table('status_pagseguros')->insert([
            'name' => 'Retenção temporária',
        ]);
    }
}
