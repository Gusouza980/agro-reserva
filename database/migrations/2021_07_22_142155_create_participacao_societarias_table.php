<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipacaoSocietariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participacao_societarias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("credito_analise_id");
            $table->string("nome_empresa", 40)->nullable();
            $table->string("cnpj_empresa", 14)->nullable();
            $table->double("percentual_participacao")->nullable();
            $table->string("uf", 2)->nullable();
            $table->date("dt_inicio_participacao")->nullable();
            $table->date("dt_atualizacao")->nullable();
            $table->boolean("possui_restricao");
            $table->string("situacao_empresa", 50)->nullable();
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
        Schema::dropIfExists('participacao_societarias');
    }
}
