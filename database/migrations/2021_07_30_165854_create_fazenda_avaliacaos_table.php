<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFazendaAvaliacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fazenda_avaliacaos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("fazenda_id");
            $table->string("nome")->default("");
            $table->string("caminho")->default("");
            $table->timestamps();
            $table->foreign('fazenda_id')->references('id')->on('fazendas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fazenda_avaliacaos');
    }
}
