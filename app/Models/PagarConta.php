<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagarConta extends Model
{
    use HasFactory;

    protected $table = 'pagar_contas';

    protected $fillable = [

        'valor_pagar',   
        'valor_aberto',       
        'status',
        'pagar_conta_data',

        'compra_id'

    ];

    protected $dates = ['pagar_conta_data'];


    public function compra()
    {
        return $this->belongsTo(Compra::class);
    }

    public function pagamentos()
    {
        return $this->hasMany(Pagamento::class);
    }
}
