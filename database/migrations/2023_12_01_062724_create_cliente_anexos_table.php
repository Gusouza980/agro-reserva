<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteAnexosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_anexos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->tinyInteger("tipo")->default(0)->nullable();
            $table->string("caminho")->nullable();
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
        Schema::dropIfExists('cliente_anexos');
    }
}
