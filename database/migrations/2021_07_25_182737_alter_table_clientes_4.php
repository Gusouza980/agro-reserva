<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableClientes4 extends Migration
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
            // 0 => Solteiro(a)
            // 1 => Casado(a)
            // 2 => Víuvo(a)
            // 3 => União Estável
            $table->string("estado_civil")->default(0);
            $table->tinyInteger("aprovado")->default(0);
            $table->string("rg", 12)->nullable();
            $table->string("inscricicao_produtor_rural", 20)->nullable();
            $table->string("referencia_comercial1", 50)->nullable();
            $table->string("referencia_comercial1_tel", 20)->nullable();
            $table->string("referencia_comercial2", 50)->nullable();
            $table->string("referencia_comercial2_tel", 20)->nullable();
            $table->string("referencia_comercial3", 50)->nullable();
            $table->string("referencia_comercial3_tel", 20)->nullable();
            $table->string("referencia_bancaria_banco")->nullable();
            $table->string("referencia_bancaria_gerente")->nullable();
            $table->string("referencia_bancaria_tel",20)->nullable();
            $table->string("referencia_coorporativa1")->nullable();
            $table->string("referencia_coorporativa1_tel", 20)->nullable();
            $table->string("referencia_coorporativa2")->nullable();
            $table->string("referencia_coorporativa2_tel", 20)->nullable();
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
