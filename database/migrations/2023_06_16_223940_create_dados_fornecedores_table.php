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
        Schema::create('dados_fornecedores', function (Blueprint $table) {
            $table->id(); 
            $table->string('fornecedor_cidade');           
            $table->string('fornecedor_cpf', 14)->unique();
            $table->string('fornecedor_phone', 15)->unique();
            $table->string('fornecedor_address');  
           

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
        Schema::dropIfExists('dados_fornecedores');
    }
};
