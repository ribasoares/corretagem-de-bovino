<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    use HasFactory;

    protected $fillable = [

        'pagamento_valor',
        'pagamento_data',

        'pagar_conta_id',
        'forma_pagamento_id'
       

    ];

    protected $dates = ['pagamento_data'];

    public function pagar_conta()
    {
        return $this->belongsTo(PagarConta::class);
    }

    public function forma_pagamento()
    {
        return $this->belongsTo(FormaPagamento::class);
    }


}
