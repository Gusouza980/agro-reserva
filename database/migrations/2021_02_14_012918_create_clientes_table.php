<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string("nome_dono", 100)->nullable();
            $table->string("nome_fazenda", 150)->nullable();
            $table->string("senha", 255);
            $table->string("logo", 255)->nullable();
            $table->string("cnpj", 50)->nullable();
            $table->string("cep", 50)->nullable();
            $table->string("cidade", 50)->nullable();
            $table->string("interesses", 255)->nullable();
            $table->string("estado", 5)->nullable();
            $table->string("bairro", 50)->nullable();
            $table->string("numero", 6)->nullable();
            $table->string("complemento", 255)->nullable();
            $table->string("rua", 255)->nullable();
            $table->string("email", 100);
            $table->string("telefone", 50)->nullable();
            $table->string("whatsapp", 50)->nullable();
            $table->boolean("finalizado")->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
