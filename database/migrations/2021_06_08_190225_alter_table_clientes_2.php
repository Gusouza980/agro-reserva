<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableClientes2 extends Migration
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
            $table->string("entrega_rua", 100)->nullable();
            $table->string("entrega_numero", 6)->nullable();
            $table->string("entrega_bairro", 60)->nullable();
            $table->string("entrega_cidade", 60)->nullable();
            $table->string("entrega_estado", 2)->nullable();
            $table->string("entrega_cep", 2)->nullable();
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
