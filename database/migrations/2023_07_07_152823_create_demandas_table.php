<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("solicitante_id");
            $table->unsignedBigInteger("solicitado_id");
            $table->string("titulo");
            $table->string("descricao", 400)->nullable();
            $table->date("previsao_entrega")->nullable();
            $table->date("entrega")->nullable();
            $table->boolean("urgente")->default(false);
            $table->boolean("arquivar")->default(false);
            $table->string("arquivo")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demandas');
    }
}
