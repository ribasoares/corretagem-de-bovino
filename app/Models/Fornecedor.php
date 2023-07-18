<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    protected $table = 'fornecedores';

    protected $fillable = [

        'fornecedor_nome',
        'status'
       

    ];

    public function dado_fornecedor()
    {
        return $this->hasOne(DadoFornecedor::class);
    }

    public function compra()
    {
        return $this->hasOne(Compra::class);
    }

}
