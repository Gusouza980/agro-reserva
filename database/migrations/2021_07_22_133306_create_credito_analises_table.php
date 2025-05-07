<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditoAnalisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credito_analises', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("cliente_id");
            $table->string("nome", 70)->nullable();
            $table->date("nascimento")->nullable();
            $table->tinyInteger("situacao")->nullable();
            $table->string("doc_situacao", 30)->nullable();
            $table->date("data_situacao")->nullable();
            $table->boolean("ccf_disponivel")->default(false);
            $table->string("nome_mae", 40)->nullable();
            $table->double("capacidade_pagamento_com_positivo")->nullable();
            $table->timestamps();
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credito_analises');
    }
}
