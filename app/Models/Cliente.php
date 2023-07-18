<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'cliente_nome',
        'status'
       

    ];

    public function dado_cliente()
    {
        return $this->hasOne(DadoCliente::class);
    }

      public function venda()
    {
        return $this->hasOne(Venda::class);
    }
}
