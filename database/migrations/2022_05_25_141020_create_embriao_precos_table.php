<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmbriaoPrecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('embriao_precos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("embriao_id");
            $table->integer("unidades");
            $table->double("preco", 8, 2);
            $table->double("desconto", 5, 2)->default(0);
            $table->timestamps();
            $table->foreign('embriao_id')->references('id')->on('embriaos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('embriao_precos');
    }
}
