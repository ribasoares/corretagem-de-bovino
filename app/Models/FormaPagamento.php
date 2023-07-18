<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormaPagamento extends Model
{
    use HasFactory;

    protected $table = 'formas_pagamentos';

    protected $fillable = [

        'forma_pagamento'

    ];

    public function pagamento()
    {
        return $this->hasOne(Pagamento::class);
    }

    public function recebimento()
    {
        return $this->hasOne(Recebimento::class);
    }


}
