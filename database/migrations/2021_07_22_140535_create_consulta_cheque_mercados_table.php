<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultaChequeMercadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consulta_cheque_mercados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("credito_analise_id");
            $table->string("dia_mes_primeiro_cheque_a_vista", 5)->nullable();
            $table->string("dia_mes_ultimo_cheque_a_vista", 5)->nullable();
            $table->integer("tot_15_dias_a_vista")->nullable();
            $table->integer("tot_30_dias_a_prazo")->nullable();
            $table->integer("tot_60_dias_a_prazo")->nullable();
            $table->integer("tot_90_dias_a_prazo")->nullable();
            $table->integer("tot_cheques_prazo")->nullable();
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
        Schema::dropIfExists('consulta_cheque_mercados');
    }
}
