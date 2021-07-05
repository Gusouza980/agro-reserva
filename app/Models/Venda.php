<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

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
}
