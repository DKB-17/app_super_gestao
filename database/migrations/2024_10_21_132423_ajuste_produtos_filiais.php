<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjusteProdutosFiliais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // criando a tabela filiais
        Schema::create('filiais', function (Blueprint $table) {
           $table->id();
           $table->string('filial',30);
           $table->timestamps();
        });

        // criando a tabela produto_filiais
        Schema::create('produto_filiais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('filial_id')->constrained('filiais');
            $table->foreignId('produto_id')->constrained('produtos');
            $table->decimal('preco_venda',8,2);
            $table->integer('estoque_maximo');
            $table->integer('estoque_minimo');
            $table->timestamps();
        });

        // removendo colunas da tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn(['preco_venda', 'estoque_maximo', 'estoque_minimo']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //adicionando os campos da tabela produto
        Schema::table('produtos', function (Blueprint $table) {
            $table->decimal('preco_venda',8,2);
            $table->integer('estoque_maximo');
            $table->integer('estoque_minimo');
        });

        //removendo a tabela intermediaria produto_filiais
        Schema::dropIfExists('produto_filiais');

        //removendo a tabela filiais
        Schema::dropIfExists('filiais');
    }
}
