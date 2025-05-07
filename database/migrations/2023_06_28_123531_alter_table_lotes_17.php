<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableLotes17 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lotes', function (Blueprint $table) {
            $table->string("brinco", 30)->nullable();
            $table->string("lactacao_mae", 50)->nullable();
            $table->string("lactacao_avo_paterna", 50)->nullable();
            $table->string("lactacao_avo_materna", 50)->nullable();
            $table->string("lactacao_total", 60)->nullable();
            $table->string("ocitocina", 10)->nullable();
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
