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
        Schema::create('lucros_totais', function (Blueprint $table) {
            $table->id();
           // $table->float('lucro_total', 10, 2);
           // $table->float('lucro_total_aberto', 10, 2);

           // $table->unsignedBigInteger('vendedor_id')->constrained('vendedores');
            //$table->foreign('vendedor_id')->references('id')->on('vendedores')->onDelete('cascade');

           // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lucros_totais');
    }
};
