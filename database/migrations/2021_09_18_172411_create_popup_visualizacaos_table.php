<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePopupVisualizacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('popup_visualizacaos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("cliente_id")->nullable();
            $table->unsignedBigInteger("popup_id");
            $table->string("ip", 20)->nullable();
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
        Schema::dropIfExists('popup_visualizacaos');
    }
}
