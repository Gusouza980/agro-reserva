<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmbriaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('embriaos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("reserva_id");
            $table->double("producao_gordura", 8, 2)->nullable();
            $table->double("producao_proteina", 8, 2)->nullable();
            $table->double("indice", 8, 2)->nullable();
            $table->string("grau_sangue", 50)->nullable();
            $table->double("leite", 8, 2)->nullable();
            $table->integer("longevidade")->nullable();
            $table->double("ingestao_alimentar", 8, 2)->nullable();
            $table->double("persistencia", 8, 2)->nullable();
            $table->integer("idade_primeiro_parto", 8, 2)->nullable();
            $table->double("facilidade_parto_touro", 8, 2)->nullable();
            $table->double("fertilidade_filhas", 8, 2)->nullable();
            $table->double("sanidade_ubere", 8, 2)->nullable();
            $table->double("sanidade_casco", 8, 2)->nullable();
            $table->double("dpr", 8, 2)->nullable();
            $table->timestamps();
            $table->foreign('reserva_id')->references('id')->on('reservas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('embriaos');
    }
}
