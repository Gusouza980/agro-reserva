<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDadosEquinoToLotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lotes', function (Blueprint $table) {
            $table->tinyInteger("tipo")->default(0)->comment("0 - Bovino, 1 - Equino, 2 - Embrião");
            $table->string('especie', 50)->nullable();
            $table->string('pelagem', 50)->nullable();
            $table->string('chip', 15)->nullable();
            $table->date('cobert')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lotes', function (Blueprint $table) {
            //
        });
    }
}
