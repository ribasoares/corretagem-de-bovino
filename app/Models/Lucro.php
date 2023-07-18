<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lucro extends Model
{
    use HasFactory;

    protected $fillable = [

        'lucro_KG',         
        'lucro_total',
        'status',
        'lucro_data',

        'venda_id',
        'vendedor_id',
        

    ];

    protected $dates = ['lucro_data'];

    public function venda()
    {
        return $this->belongsTo(Venda::class);
    }

    public function vendedor()
    {
        return $this->belongsTo(Vendedor::class);
    }

    public function lucro_total()
    {
        return $this->belongsTo(LucroTotal::class);
    }

  
}
