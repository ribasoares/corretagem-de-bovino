<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = [

        'venda_quantidade',
        'venda_peso',
        'venda_valor_kg',
        'valor_receber', 
        'venda_data',          

        'cliente_id',
        'vendedor_id',
        'estoque_id'

    ];

    protected $dates = ['venda_data'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class)->orderBy('Cliente_nome', 'asc');
    }

    public function estoque()
    {
        return $this->belongsTo(Estoque::class);

    }

    public function vendedor()
    {
        return $this->belongsTo(Vendedor::class);

    }

    public function receber_conta()
    {
        return $this->hasOne(ReceberConta::class);
    }

    public function lucro()
    {
        return $this->hasOne(Lucro::class);
    }



    
}
