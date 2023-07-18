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
        Schema::create('recebimentos', function (Blueprint $table) {
            $table->id();
            $table->float('recebimento_valor', 10, 2)->nullable(); 
            $table->date('recebimento_data');   

            $table->unsignedBigInteger('receber_conta_id')->constrained('receber_contas');
            $table->foreign('receber_conta_id')->references('id')->on('receber_contas')->onDelete('cascade');

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
        Schema::dropIfExists('recebimentos');
    }
};
