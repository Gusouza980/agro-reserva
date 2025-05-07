<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmailFotoAtivoAssessors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assessors', function (Blueprint $table) {
            $table->string("email", 100)->nullable();
            $table->boolean("ativo")->default(true);
            $table->boolean("marketplace")->default(true);
            $table->string("foto")->nullable();
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
