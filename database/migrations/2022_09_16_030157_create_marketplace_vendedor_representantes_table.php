<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketplaceVendedorRepresentantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketplace_vendedor_representantes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("marketplace_vendedor_id");
            $table->string("nome", 60);
            $table->string("email", 60)->nullable();
            $table->string("telefone", 18)->nullable();
            $table->string("cpf", 14)->nullable();
            $table->string("identidade", 20)->nullable();
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
        Schema::dropIfExists('marketplace_vendedor_representantes');
    }
}
