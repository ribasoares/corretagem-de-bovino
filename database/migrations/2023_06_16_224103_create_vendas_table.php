<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->float('venda_quantidade');
            $table->float('venda_peso', 10, 2);
            $table->float('venda_valor_kg'); 
            $table->float('valor_receber', 10, 2);
            $table->date('venda_data');  
                                  

            $table->unsignedBigInteger('cliente_id')->constrained('clientes');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');

            $table->unsignedBigInteger('vendedor_id')->constrained('vendedores');
            $table->foreign('vendedor_id')->references('id')->on('vendedores')->onDelete('cascade');

            $table->unsignedBigInteger('estoque_id')->constrained('estoques');
            $table->foreign('estoque_id')->references('id')->on('estoques')->onDelete('cascade');

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
        Schema::dropIfExists('vendas');
    }
};
