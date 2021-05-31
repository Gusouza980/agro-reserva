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
            $table->unsignedBigInteger("carrinho_id");
            $table->string("codigo", 11)->nullable();
            // 0 => Boleto
            // 1 => Whatsapp
            $table->tinyInteger("tipo");

            // 0 => Aguardando Pagamento
            // 1 => Concluída
            $table->tinyInteger("situacao")->default(0);

            $table->text("observacoes")->nullable();
            $table->string("rastreio")->nullable();
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
        Schema::dropIfExists('vendas');
    }
}
