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
        Schema::create('estoques', function (Blueprint $table) {
            $table->id();
            $table->float('quant_disponivel', 10, 2);

            // OBS: coluna removida
            $table->float('compra_valorKG', 10, 2);

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
        Schema::dropIfExists('estoques');
    }
};
$table->tinyInteger('status')->default(1); 