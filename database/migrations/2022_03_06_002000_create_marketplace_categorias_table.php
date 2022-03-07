<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketplaceCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketplace_categorias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("marketplace_categoria_id")->nullable();
            $table->string("nome", 50)->nullable();
            $table->boolean("subcategoria")->default(false);
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
        Schema::dropIfExists('marketplace_categorias');
    }
}
