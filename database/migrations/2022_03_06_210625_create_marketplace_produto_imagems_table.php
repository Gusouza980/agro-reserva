<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketplaceProdutoImagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketplace_produto_imagems', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("marketplace_produto_id");
            $table->string("caminho");
            $table->timestamps();
            $table->foreign('marketplace_produto_id')->references('id')->on('marketplace_produtos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marketplace_produto_imagems');
    }
}
