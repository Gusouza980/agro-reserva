<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvaSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prova_socials', function (Blueprint $table) {
            $table->id();
            $table->string("nome", 50)->nullable();
            $table->string("thumbnail")->nullable();
            $table->string("video");
            $table->boolean("ativo");
            $table->integer("visualizacoes")->default(0);
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
        Schema::dropIfExists('prova_socials');
    }
}
