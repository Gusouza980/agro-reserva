<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservaFormasPagamentoRegrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_formas_pagamento_regras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("reserva_formas_pagamento_id");
            $table->unsignedTinyInteger("meses");
            $table->unsignedTinyInteger("parcelas");
            $table->unsignedTinyInteger("posicao");
            $table->timestamps();

            $table->foreign('reserva_formas_pagamento_id', 'reserva_regras_pagamento')->references('id')->on('reserva_formas_pagamentos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserva_formas_pagamento_regras');
    }
}
