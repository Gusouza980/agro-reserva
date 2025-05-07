<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("carrinho_id")->nullable();
            $table->unsignedBigInteger("cliente_id");
            $table->unsignedBigInteger("assessor_id")->nullable();
            $table->unsignedBigInteger("lote_id")->nullable();
            $table->unsignedBigInteger("fazenda_id")->nullable();
            $table->string("codigo", 11)->nullable();

            // 0 => Boleto
            // 1 => Whatsapp
            $table->tinyInteger("tipo");

            // 0 => Aguardando Pagamento
            // 1 => Concluída
            // 2 => Cancelada
            $table->tinyInteger("situacao")->default(0);

            $table->text("observacoes")->nullable();
            $table->string("rastreio")->nullable();
            $table->timestamps();
            
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('carrinho_id')->references('id')->on('carrinhos')->onDelete('cascade');
            $table->foreign('assessor_id')->references('id')->on('assessors')->onDelete('set null');
            $table->foreign('lote_id')->references('id')->on('lotes')->onDelete('cascade');
            $table->foreign('fazenda_id')->references('id')->on('fazendas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendas');
    }
}
