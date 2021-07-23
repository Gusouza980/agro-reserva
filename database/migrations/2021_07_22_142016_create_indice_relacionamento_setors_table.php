<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndiceRelacionamentoSetorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indice_relacionamento_setors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("credito_analise_id");
            $table->string("cod_setor", 2)->nullable();
            $table->string("desc_setor", 100)->nullable();
            $table->string("faixa", 2)->nullable();
            $table->string("relacionamento", 100)->nullable();
            $table->string("tendencia", 100)->nullable();
            $table->string("mensagem", 80)->nullable();
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
        Schema::dropIfExists('indice_relacionamento_setors');
    }
}
