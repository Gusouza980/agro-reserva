<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableClientes8 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('clientes', function (Blueprint $table) {
            $table->boolean("assinante_newsletter")->default(false);
            $table->string("nome_fantasia", 100)->nullable();
            $table->boolean("termos_aceitos")->default(false);
            $table->string("cep_propriedade", 9)->nullable();
            $table->string("rua_propriedade", 50)->nullable();
            $table->string("numero_propriedade", 10)->nullable();
            $table->string("bairro_propriedade", 50)->nullable();
            $table->string("cidade_propriedade", 50)->nullable();
            $table->string("estado_propriedade", 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
