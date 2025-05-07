<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultaReferenciaComercialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consulta_referencia_comercials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("credito_analise_id");
            $table->string("consultante_1", 25)->nullable();
            $table->string("dia_mes_consulta_1", 5)->nullable();
            $table->string("consultante_2", 25)->nullable();
            $table->string("dia_mes_consulta_2", 5)->nullable();
            $table->string("consultante_3", 25)->nullable();
            $table->string("dia_mes_consulta_3", 5)->nullable();
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
        Schema::dropIfExists('consulta_referencia_comercials');
    }
}
