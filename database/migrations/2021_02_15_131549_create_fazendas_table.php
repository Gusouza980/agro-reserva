<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFazendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fazendas', function (Blueprint $table) {
            $table->id();
            $table->string("nome_dono", 200)->nullable();
            $table->string("nome_fazenda", 200)->nullable();
            $table->string("slug", 200)->nullable();
            $table->string("logo", 255)->nullable();
            $table->string("cnpj", 50)->nullable();
            $table->string("email", 100)->unique();
            $table->string("telefone", 50)->nullable();
            $table->string("whatsapp", 50)->nullable();
            $table->string("fundo_destaque", 255)->nullable();
            $table->string("titulo_conheca", 100)->nullable();
            $table->text("texto_conheca")->nullable();
            $table->string("video_conheca", 255)->nullable();
            $table->string("fundo_conheca", 255)->nullable();
            $table->string("titulo_conheca_lotes", 100)->nullable();
            $table->string("animais_conheca_lotes", 10)->nullable();
            $table->string("embrioes_conheca_lotes", 10)->nullable();
            $table->string("bezerros_conheca_lotes", 10)->nullable();
            $table->string("video_conheca_lotes", 255)->nullable();
            $table->string("fundo_conheca_lotes", 255)->nullable();
            $table->text("texto_conheca_avaliacao_resumo")->nullable();
            $table->string("quantidade_conheca_avaliacao_producao", 10)->nullable();
            $table->string("fundo_conheca_avaliacao", 255)->nullable();
            $table->boolean("ativo")->default(false);
            $table->datetime("data_inicio_reserva")->nullable();
            $table->datetime("data_fim_reserva")->nullable();
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
        Schema::dropIfExists('fazendas');
    }
}
