<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableFazendas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('fazendas', function (Blueprint $table) {
            $table->string("miniatura_conheca", 255)->nullable();
            $table->string("miniatura_conheca_lotes", 255)->nullable();
            $table->string("miniatura_conheca_avaliacao", 255)->nullable();
            $table->string("miniatura_conheca_depoimentos", 255)->nullable();
            $table->string("fundo_conheca_depoimentos", 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
