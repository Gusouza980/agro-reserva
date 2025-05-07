<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketplaceVendedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketplace_vendedors', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->string("logo")->nullable();
            $table->tinyInteger("segmento")->default(0);
            $table->string("cnpj", 25)->nullable();
            $table->string("email", 100)->nullable();
            $table->string("senha")->nullable();
            $table->string("telefone", 20)->nullable();
            $table->string("cep", 9)->nullable();
            $table->string("cidade", 50)->nullable();
            $table->string("estado", 2)->nullable();
            $table->string("rua", 100)->nullable();
            $table->string("numero", 5)->nullable();
            $table->string("bairro", 50)->nullable();
            $table->boolean("ativo")->default(false);
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
        Schema::dropIfExists('marketplace_vendedors');
    }
}
