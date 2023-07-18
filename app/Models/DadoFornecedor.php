<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DadoFornecedor extends Model
{
    use HasFactory;

    protected $table = 'dados_fornecedores';

    protected $fillable = [

        'fornecedor_cidade',
        'fornecedor_cpf',
        'fornecedor_phone',
        'fornecedor_address',

        'fornecedor_id'
       

    ];

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }
}
