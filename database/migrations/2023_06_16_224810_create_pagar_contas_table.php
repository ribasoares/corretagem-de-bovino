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
        Schema::create('pagar_contas', function (Blueprint $table) {
            $table->id();
            $table->float('valor_pagar', 10, 2)->nullable(); 
            $table->float('valor_aberto', 10, 2)->nullable();          
            $table->tinyInteger('status')->default(1); 
            $table->date('pagar_conta_data'); 

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
        Schema::dropIfExists('conta_pagar');
    }
};
