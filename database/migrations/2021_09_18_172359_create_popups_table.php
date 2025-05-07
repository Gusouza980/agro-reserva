<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePopupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('popups', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger("modelo")->default(0);
            $table->boolean("visitante")->default(false);
            $table->boolean("precadastro")->default(false);
            $table->boolean("finalizado")->default(false);
            $table->tinyInteger("pagina")->default(0);
            $table->string("descricao");
            $table->date("inicio");
            $table->date("fim");
            $table->boolean("ativo");
            $table->string("imagem");
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
        Schema::dropIfExists('popups');
    }
}
