<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentoRoubadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento_roubados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("credito_analise_id");
            $table->string("tipo_documento", 6)->nullable();
            $table->string("num_documento", 20)->nullable();
            $table->date("dt_ocorrencia")->nullable();
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
        Schema::dropIfExists('documento_roubados');
    }
}
