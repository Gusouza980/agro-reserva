<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepoimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depoimentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("fazenda_id");
            $table->string("titulo");
            $table->text("texto");
            $table->string("video", 255)->nullable();
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
        Schema::dropIfExists('depoimentos');
    }
}
