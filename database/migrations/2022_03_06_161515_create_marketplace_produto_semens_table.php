<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketplaceProdutoSemensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketplace_produto_semens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("raca_id")->nullable();
            $table->date("nascimento")->nullable();
            $table->string("registro", 10)->nullable();
            $table->string("proprietario", 100)->nullable();
            $table->string("pai", 50)->nullable();
            $table->string("mae", 50)->nullable();
            $table->string("avo_paterno", 50)->nullable();
            $table->string("avo_paterna", 50)->nullable();
            $table->string("avo_materno", 50)->nullable();
            $table->string("avo_materna", 50)->nullable();
            $table->string("linhagem", 50)->nullable();
            $table->integer("doses")->nullable();
            $table->string("pdf")->nullable();
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
        Schema::dropIfExists('marketplace_produto_semens');
    }
}
