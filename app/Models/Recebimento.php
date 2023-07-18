<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recebimento extends Model
{
    use HasFactory;

    protected $fillable = [

        'recebimento_valor',
        'recebimento_data',

        'receber_conta_id',
        'forma_pagamento_id'

    ];

    protected $dates = ['recebimento_data'];

    public function receber_conta()
    {
        return $this->belongsTo(ReceberConta::class);
    }

    public function forma_pagamento()
    {
        return $this->belongsTo(FormaPagamento::class);
    }
}
