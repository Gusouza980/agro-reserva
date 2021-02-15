<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFazendaRacasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fazenda_racas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("fazenda_id");
            $table->unsignedBigInteger("raca_id");
            $table->foreign('fazenda_id')->references('id')->on('fazendas')->onDelete('cascade');
            $table->foreign('raca_id')->references('id')->on('racas')->onDelete('cascade');
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
        Schema::dropIfExists('fazenda_racas');
    }
}
