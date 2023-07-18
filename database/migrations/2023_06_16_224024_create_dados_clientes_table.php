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
        Schema::create('dados_clientes', function (Blueprint $table) {
            $table->id(); 
            $table->string('cliente_estabelecimento');           
            $table->string('cliente_cpf', 14)->unique();
            $table->string('cliente_phone', 15)->unique();
            $table->string('cliente_address');  
           

            $table->unsignedBigInteger('cliente_id')->constrained('clientes');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');

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
        Schema::dropIfExists('dados_clientes');
    }
};
