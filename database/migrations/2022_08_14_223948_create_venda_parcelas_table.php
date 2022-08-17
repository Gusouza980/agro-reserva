<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendaParcelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venda_parcelas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("venda_id");
            $table->double("numero")->default(1);
            $table->double("valor")->default(0);
            $table->date("vencimento");
            $table->boolean("recebido")->default(false);
            $table->timestamps();
            $table->foreign('venda_id')->references('id')->on('vendas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venda_parcelas');
    }
}
