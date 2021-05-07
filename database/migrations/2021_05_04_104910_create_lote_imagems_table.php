<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoteImagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lote_imagems', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("lote_id")->nullable();
            $table->string("caminho")->nullable();
            //0 -> Upload de Imagem
            //1 -> Link de Imagem
            //2 -> Vídeo
            $table->tinyInteger("tipo")->default(0);
            $table->timestamps();
            $table->foreign('lote_id')->references('id')->on('lotes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lote_imagems');
    }
}
