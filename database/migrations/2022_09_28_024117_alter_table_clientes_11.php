<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableClientes11 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('clientes', function (Blueprint $table) {
            $table->boolean("check_nome_propriedade")->default(false);
            $table->string("obs_nome_propriedade", 300)->nullable();

            $table->boolean("check_cpf")->default(false);
            $table->string("obs_cpf", 300)->nullable();

            $table->boolean("check_rg")->default(false);
            $table->string("obs_rg", 300)->nullable();

            $table->boolean("check_cnpj")->default(false);
            $table->string("obs_cnpj", 300)->nullable();

            $table->boolean("check_inscricao_estadual")->default(false);
            $table->string("obs_inscricao_estadual", 300)->nullable();

            $table->boolean("check_endereco_residencial")->default(false);
            $table->string("obs_endereco_residencial", 300)->nullable();

            $table->boolean("check_endereco_propriedade")->default(false);
            $table->string("obs_endereco_propriedade", 300)->nullable();

            $table->boolean("check_declaracao_imposto")->default(false);
            $table->string("obs_declaracao_imposto", 300)->nullable();

            $table->boolean("check_selfie")->default(false);
            $table->string("obs_selfie", 300)->nullable();

            $table->boolean("check_referencia_bancaria")->default(false);
            $table->string("obs_referencia_bancaria", 300)->nullable();

            $table->boolean("check_referencia_comercial")->default(false);
            $table->string("obs_referencia_comercial", 300)->nullable();

            $table->boolean("check_processo_judicial")->default(false);
            $table->string("obs_processo_judicial", 300)->nullable();

            $table->boolean("check_referencia_comercial_analise")->default(false);
            $table->string("obs_referencia_comercial_analise", 300)->nullable();

            $table->string("obs_conclusao", 300)->nullable();
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
