<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableLotes15 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('lotes', function (Blueprint $table) {
            $table->string("avo_paterno", 50)->nullable();
            $table->string("rgd_avo_paterno", 8)->nullable();
            $table->string("avo_paterna", 50)->nullable();
            $table->string("rgd_avo_paterna", 8)->nullable();
            $table->string("avo_materno", 50)->nullable();
            $table->string("rgd_avo_materno", 8)->nullable();
            $table->string("avo_materna", 50)->nullable();
            $table->string("rgd_avo_materna", 8)->nullable();
            $table->string("pai", 50)->nullable();
            $table->string("rgd_pai", 8)->nullable();
            $table->string("mae", 50)->nullable();
            $table->string("rgd_mae", 8)->nullable();
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
