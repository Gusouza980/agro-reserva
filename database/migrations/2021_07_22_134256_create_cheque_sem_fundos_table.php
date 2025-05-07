<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChequeSemFundosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cheque_sem_fundos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("credito_analise_id");
            $table->date("data_ocorrencia")->nullable();
            $table->string("numero_cheque", 10)->nullable();
            $table->string("alinea_cheque", 5)->nullable();
            $table->integer("quantidade_ccf")->nullable();
            $table->double("valor_cheque")->nullable();
            $table->string("numero_banco", 3)->nullable();
            $table->string("nome_banco", 14)->nullable();
            $table->string("agencia", 4)->nullable();
            $table->string("cidade", 30)->nullable();
            $table->string("uf", 2)->nullable();
            $table->timestamps();
            $table->foreign('credito_analise_id')->references('id')->on('credito_analises')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cheque_sem_fundos');
    }
}
