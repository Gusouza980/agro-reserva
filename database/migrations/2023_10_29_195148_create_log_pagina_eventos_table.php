<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogPaginaEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_pagina_eventos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('log_pagina_id');
            $table->tinyInteger("tipo")->default(0)->comment("Define o tipo do evento. 0 é click");
            $table->string("id_elemento")->nullable()->comment("id do elemento clicado caso tenha");
            $table->timestamps();
            $table->foreign('log_pagina_id')->references('id')->on('log_paginas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_pagina_eventos');
    }
}
