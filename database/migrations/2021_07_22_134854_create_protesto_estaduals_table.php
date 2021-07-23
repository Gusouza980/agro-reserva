<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProtestoEstadualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protesto_estaduals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("credito_analise_id");
            $table->date("data_ocorrencia")->nullable();
            $table->string("tipo_moeda", 3)->nullable();
            $table->double("valor_protesto")->nullable();
            $table->string("cartorio", 2)->nullable();
            $table->string("cidade", 30)->nullable();
            $table->string("uf", 2)->nullable();
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
        Schema::dropIfExists('protesto_estaduals');
    }
}
