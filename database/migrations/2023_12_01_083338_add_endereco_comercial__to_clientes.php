<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEnderecoComercialToClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->string("cep_comercial", 20)->nullable();
            $table->string("rua_comercial", 255)->nullable();
            $table->string("cidade_comercial", 50)->nullable();
            $table->string("estado_comercial", 5)->nullable();
            $table->string("bairro_comercial", 50)->nullable();
            $table->string("numero_comercial", 6)->nullable();
            $table->string("complemento_comercial", 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clientes', function (Blueprint $table) {
            //
        });
    }
}
