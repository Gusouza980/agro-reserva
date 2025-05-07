<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Cliente::create([
        //     "nome_dono" => "Cliente 1",
        //     "nome_fazenda" => "Fazenda 1",
        //     "senha" => bcrypt("123456"),
        //     "email" => "cliente1@gmail.com",
        //     "telefone" => "12345678901",
        //     "whatsapp" => "12345678901",
        //     "finalizado" => false,
        //     'pais' => 'Brasil',
        // ]);

        Cliente::create([
            "nome_dono" => "Cliente 2",
            "nome_fazenda" => "Fazenda 2",
            "senha" => bcrypt("123456"),
            "email" => "cliente2@gmail.com",
            "telefone" => "12345678902",
            "whatsapp" => "12345678902",
            "finalizado" => false,
            'pais' => 'Brasil',
        ]);

        Cliente::create([
            "nome_dono" => "Cliente 3",
            "nome_fazenda" => "Fazenda 3",
            "senha" => bcrypt("123456"),
            "email" => "cliente3@gmail.com",
            "telefone" => "12345678903",
            "whatsapp" => "12345678903",
            "finalizado" => false,
            'pais' => 'Brasil',
        ]);

        Cliente::create([
            "nome_dono" => "Cliente 4",
            "nome_fazenda" => "Fazenda 4",
            "senha" => bcrypt("123456"),
            "email" => "cliente4@gmail.com",
            "telefone" => "12345678904",
            "whatsapp" => "12345678904",
            "finalizado" => false,
            'pais' => 'Brasil',
        ]);

        Cliente::create([
            "nome_dono" => "Cliente 5",
            "nome_fazenda" => "Fazenda 5",
            "senha" => bcrypt("123456"),
            "email" => "cliente5@gmail.com",
            "telefone" => "12345678905",
            "whatsapp" => "12345678905",
            "finalizado" => false,
            'pais' => 'Brasil',
        ]);

        Cliente::create([
            "nome_dono" => "Cliente 6",
            "nome_fazenda" => "Fazenda 6",
            "senha" => bcrypt("123456"),
            "email" => "cliente6@gmail.com",
            "telefone" => "12345678906",
            "whatsapp" => "12345678906",
            "finalizado" => false,
            'pais' => 'Brasil',
        ]);

        Cliente::create([
            "nome_dono" => "Cliente 7",
            "nome_fazenda" => "Fazenda 7",
            "senha" => bcrypt("123456"),
            "email" => "cliente7@gmail.com",
            "telefone" => "12345678907",
            "whatsapp" => "12345678907",
            "finalizado" => false,
            'pais' => 'Brasil',
        ]);

        Cliente::create([
            "nome_dono" => "Cliente 8",
            "nome_fazenda" => "Fazenda 8",
            "senha" => bcrypt("123456"),
            "email" => "cliente8@gmail.com",
            "telefone" => "12345678908",
            "whatsapp" => "12345678908",
            "finalizado" => false,
            'pais' => 'Brasil',
        ]);

        Cliente::create([
            "nome_dono" => "Cliente 9",
            "nome_fazenda" => "Fazenda 9",
            "senha" => bcrypt("123456"),
            "email" => "cliente9@gmail.com",
            "telefone" => "12345678909",
            "whatsapp" => "12345678909",
            "finalizado" => false,
            'pais' => 'Brasil',
        ]);
    }
}
