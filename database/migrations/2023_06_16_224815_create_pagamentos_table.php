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
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            $table->float('pagamento_valor', 10, 2)->nullable(); 
            $table->date('pagamento_data');  

            $table->unsignedBigInteger('pagar_conta_id')->constrained('pagar_contas');
            $table->foreign('pagar_conta_id')->references('id')->on('pagar_contas')->onDelete('cascade');

            $table->unsignedBigInteger('forma_pagamento_id')->constrained('formas_pagamentos');
            $table->foreign('forma_pagamento_id')->references('id')->on('formas_pagamentos')->onDelete('cascade');

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
        Schema::dropIfExists('pagamentos');
    }
};
