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
        Schema::create('atualizar_compras', function (Blueprint $table) {
            $table->id();
            $table->integer('quantidade');
            $table->float('peso_total', 10, 2);
            $table->float('valor_kg'); 
            $table->float('valor_pagar', 10, 2); 
            $table->date('atualizar_compra_data'); 


            $table->unsignedBigInteger('compra_id')->constrained('compras');
            $table->foreign('compra_id')->references('id')->on('compras')->onDelete('cascade');

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
        Schema::dropIfExists('pos_compras');
    }
};
