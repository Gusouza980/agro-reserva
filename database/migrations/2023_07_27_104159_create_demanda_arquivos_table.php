<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandaArquivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demanda_arquivos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("demanda_id");
            $table->string("nome");
            $table->string("caminho");
            $table->string("tipo", 6)->nullable();
            $table->timestamps();
            $table->foreign('demanda_id')->references('id')->on('demandas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demanda_arquivos');
    }
}
