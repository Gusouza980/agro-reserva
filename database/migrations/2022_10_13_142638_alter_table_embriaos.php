<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableEmbriaos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('embriaos', function (Blueprint $table) {
            $table->string("video", 300)->nullable();
            $table->string("nome_pacote")->nullable();
            $table->integer("quantidade_embrioes_pacote")->nullable();
            $table->string("observacoes", 400)->nullable();
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
