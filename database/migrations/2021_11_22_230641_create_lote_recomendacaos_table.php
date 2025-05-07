<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoteRecomendacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lote_recomendacaos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("lote_id");
            $table->unsignedBigInteger("lote_recomendado_id");
            $table->timestamps();

            $table->foreign('lote_id')->references('id')->on('lotes')->onDelete('cascade');
            $table->foreign('lote_recomendado_id')->references('id')->on('lotes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lote_recomendacaos');
    }
}
