<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $append = [
        'num_parcelas'
    ];

    public function assessor(){
        return $this->belongsTo(Assessor::class);
    }

    public function carrinho(){
        return $this->belongsTo(Carrinho::class);
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function fazenda(){
        return $this->belongsTo(Fazenda::class);
    }

    public function boletos(){
        return $this->hasMany(Boleto::class);
    }

    public function notas(){
        return $this->hasMany(Nota::class);
    }

    public function lote(){
        return $this->belongsTo(Lote::class);
    }

    public function parcelas(){
        return $this->hasMany(VendaParcela::class);
    }

    public function getNumParcelasAttribute(){
        return $this->attributes['parcelas'];
    }
}
