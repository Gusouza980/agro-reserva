<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSerasaScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serasa_scores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("credito_analise_id");
            $table->integer("pontuacao")->nullable();
            $table->double("risco")->nullable();
            $table->string("desc_risco")->nullable();
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
        Schema::dropIfExists('serasa_scores');
    }
}
