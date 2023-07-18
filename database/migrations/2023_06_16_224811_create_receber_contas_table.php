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
        Schema::create('receber_contas', function (Blueprint $table) {
            $table->id();
            $table->float('valor_receber', 10, 2); 
            $table->float('valor_aberto', 10, 2)->nullable();           
            $table->tinyInteger('status')->default(1);
            $table->date('receber_conta_data'); 

            $table->unsignedBigInteger('venda_id')->constrained('vendas');
            $table->foreign('venda_id')->references('id')->on('vendas')->onDelete('cascade');

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
        Schema::dropIfExists('receber_contas');
    }
};
