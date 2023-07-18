<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceberConta extends Model
{
    use HasFactory;

    protected $table = 'receber_contas';

    protected $fillable = [

        'valor_receber',
        'valor_aberto',           
        'status',
        'receber_conta_data',

        'venda_id'

    ];

    protected $dates = ['receber_conta_data'];

    public function venda()
    {
        return $this->belongsTo(Venda::class);
    }

    public function recebimentos()
    {
        return $this->hasMany(Recebimento::class);
    }
}
