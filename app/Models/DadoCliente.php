<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DadoCliente extends Model
{
    use HasFactory;

    protected $table = 'dados_clientes';

    protected $fillable = [
        
        'cliente_estabelecimento',
        'cliente_cpf',
        'cliente_phone',
        'cliente_address',

        'cliente_id'
       

    ];


    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}

