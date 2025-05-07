<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoteNumerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lote_numeros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("fazenda_id");
            $table->string("titulo")->default("");
            $table->string("valor")->default("");
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
        Schema::dropIfExists('lote_numeros');
    }
}
