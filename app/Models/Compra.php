<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $fillable = [

        'compra_quantidade',
        'compra_estoque',
        'compra_pesoTotal',
        'compra_valor_kg',
        'compra_totalPagar',
        'compra_data',         
        'status',

        'fornecedor_id'

    ];
    
    protected $dates = ['compra_data'];

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);

    }
    
    public function pagar_conta()
    {
        return $this->hasOne(PagarConta::class);
    }

    public function estoque()
    {
       return  $this->hasOne(Estoque::class);
    }

    public function atualizar_compras()
    {
        return $this->hasMany(AtualizarCompra::class);
    }



}
