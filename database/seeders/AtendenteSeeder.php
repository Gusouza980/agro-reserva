<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AtendenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('usuarios')->insert([
            'nome' => 'Evento',
            'email' => 'evento@agroreserva.com.br',
            'senha' => Hash::make('Evento123@'),
            'usuario' => 'evento',
            'admin' => true,
            'acesso' => 1
        ]);
    }
}
