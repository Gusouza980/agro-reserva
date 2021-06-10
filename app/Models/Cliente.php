<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public function carrinhos(){
        return $this->hasMany(Carrinho::class);
    }

    public function racas(){
        return $this->belongsToMany(Raca::class, 'cliente_racas');
    }

    public function compras(){
        return $this->hasMany(Venda::class);
    }

    public function lotes_interessados(){
        return $this->hasMany(InteresseLote::class);
    }

    public function curtidas(){
        return $this->hasMany(CurtidaLote::class);
    }
}
