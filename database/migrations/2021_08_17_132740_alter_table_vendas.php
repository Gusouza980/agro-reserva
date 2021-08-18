<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableVendas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('vendas', function (Blueprint $table) {
            $table->double("porcentagem_venda")->default(100);
            $table->double("porcentagem_comissao")->default(0);
            $table->double("porcentagem_desconto")->default(0);
            $table->date("primeira_parcela")->nullable();
            $table->tinyInteger("dias_entre_parcelas")->default(30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
