<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LucroTotal extends Model
{
    use HasFactory;

    protected $table = 'lucros_totais';

    protected $fillable = [

        'lucro_total',         
        'lucro_total_aberto',
       
        'vendedor_id'

    ];

    public function vendedor()
    {
        return $this->belongsTo(Vendedor::class);
    }

    public function lucros()
    {
        return $this->hasMany(Lucro::class);
    }



}
