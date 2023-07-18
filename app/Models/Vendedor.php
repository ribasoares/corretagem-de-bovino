<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    use HasFactory;

    protected $table = 'vendedores';

    protected $fillable = [

        'vendedor_nome',         
        'descricao',
        'lucro_total',
        'lucro_total_aberto',
        'status'

        


    ];


    public function venda()
    {
        return $this->hasOne(Venda::class);
    }

    public function lucro()
    {
        return $this->hasOne(Lucro::class);
    }

    public function lucro_total()
    {
        return $this->hasOne(LucroTotal::class);
    }

    
}
