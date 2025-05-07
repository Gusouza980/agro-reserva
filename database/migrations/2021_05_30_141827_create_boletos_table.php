<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoletosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boletos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("venda_id")->nullable();
            $table->unsignedBigInteger("fazendeiro_id")->nullable();
            $table->unsignedBigInteger("usuario_id")->nullable();
            $table->string("descricao")->nullable();
            $table->tinyInteger("status")->default(0);
            $table->string("caminho");
            $table->date("validade")->nullable();
            $table->boolean("admin")->default(true);
            $table->timestamps();
            $table->foreign('venda_id')->references('id')->on('vendas')->onDelete('cascade');
            $table->foreign('fazendeiro_id')->references('id')->on('fazendeiros')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boletos');
    }
}
