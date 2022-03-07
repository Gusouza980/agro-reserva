<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketplaceProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketplace_produtos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("marketplace_vendedor_id");
            $table->string("nome")->nullable();
            $table->unsignedBigInteger("marketplace_produto_imagem_id")->nullable();
            $table->double("valor")->default(0);
            $table->integer("estoque")->default(0);
            $table->string("resumo")->nullable();
            $table->tinyInteger("segmento")->default(0);
            $table->text("descricao")->nullable();
            $table->tinyInteger("parcelas")->default(0);
            $table->boolean("cartao");
            $table->boolean("boleto");
            $table->boolean("ativo");
            $table->unsignedBigInteger("marketplace_categoria_id")->nullable();
            $table->morphs('produtable')->nullable();
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
        Schema::dropIfExists('marketplace_produtos');
    }
}
