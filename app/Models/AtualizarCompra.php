<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AtualizarCompra extends Model
{
    use HasFactory;

    protected $table = 'atualizar_compras';

    protected $fillable = [

        'quantidade',
        'peso_total',
        'valor_kg',
        'valor_pagar',
        'atualizar_compra_data',

        'compra_id'      

    ];

    protected $dates = ['atualizar_compra_data'];

    public function compra()
    {
        return $this->belongsTo(Compra::class);
    }

    
}
