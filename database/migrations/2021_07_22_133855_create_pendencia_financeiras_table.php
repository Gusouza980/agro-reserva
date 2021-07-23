<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendenciaFinanceirasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendencia_financeiras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("credito_analise_id");
            $table->date("data_ocorrencia")->nullable();
            $table->string("modalidade", 30)->nullable();
            $table->boolean("avalista")->default(false);
            $table->string("tipo_moeda", 3)->nullable();
            $table->double("valor_pendencia")->nullable();
            $table->string("contrato", 16)->nullable();
            $table->string("origem", 30)->nullable();
            $table->string("praca_embratel", 4)->nullable();
            $table->string("tipo_anotacao", 30)->nullable();
            $table->timestamps();
            $table->foreign('credito_analise_id')->references('id')->on('credito_analises')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendencia_financeiras');
    }
}
