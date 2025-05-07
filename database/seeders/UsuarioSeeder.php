<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsuarioSeeder extends Seeder
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
            'nome' => 'Admin',
            'email' => 'admin@admin.com',
            'senha' => Hash::make('12345'),
            'usuario' => 'admin',
            'admin' => true,
            'acesso' => 0
        ]);
    }
}
