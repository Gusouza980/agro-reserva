<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lotes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("fazenda_id")->nullable();
            $table->unsignedBigInteger("raca_id")->nullable();
            $table->string("nome", 100)->nullable();
            $table->string("preview")->nullable();
            $table->string("registro", 30)->nullable();
            $table->date("nascimento")->nullable();
            $table->string("genealogioa")->nullable();
            $table->double("preco")->nullable();
            $table->boolean("promocao")->default(false);
            $table->double('desconto', 4, 2)->nullable()->default(0);
            $table->integer("visitas")->default(0);
            $table->integer("carrinho")->default(0);
            $table->timestamps();
            $table->foreign('fazenda_id')->references('id')->on('fazendas')->onDelete('cascade');
            $table->foreign('raca_id')->references('id')->on('racas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lotes');
    }
}
