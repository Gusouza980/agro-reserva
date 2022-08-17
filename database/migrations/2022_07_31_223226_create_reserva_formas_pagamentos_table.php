<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservaFormasPagamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_formas_pagamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("reserva_id");
            $table->unsignedTinyInteger("minimo");
            $table->unsignedTinyInteger("maximo");
            $table->double("desconto")->default(0);
            $table->timestamps();

            $table->foreign('reserva_id')->references('id')->on('reservas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserva_formas_pagamentos');
    }
}
