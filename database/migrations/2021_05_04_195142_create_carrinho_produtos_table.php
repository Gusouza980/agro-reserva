<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrinhoProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrinho_produtos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("carrinho_id");
            $table->unsignedBigInteger("lote_id");
            $table->unsignedSmallInteger("quantidade")->default(1);
            $table->double("total")->default(0);
            $table->timestamps();
            $table->foreign('carrinho_id')->references('id')->on('carrinhos')->onDelete('cascade');
            $table->foreign('lote_id')->references('id')->on('lotes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carrinho_produtos');
    }
}
