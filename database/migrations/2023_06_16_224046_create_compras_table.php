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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            // integer porque só compra inteiro
            $table->integer('compra_quantidade');
            // alterei 'compra_estoque" para "float" para poder vender uma banda
            $table->integer('compra_estoque')->nullable();
            $table->float('compra_pesoTotal', 10, 2)->nullable();
            $table->float('compra_valor_kg'); 
            $table->float('compra_totalPagar', 10, 2)->nullable();
            $table->date('compra_data'); 
            //STATUS da quantidade restante 
            $table->tinyInteger('status')->default(1); 
           

            $table->unsignedBigInteger('fornecedor_id')->constrained('fornecedores');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores')->onDelete('cascade');

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
        Schema::dropIfExists('compras');
    }
};
