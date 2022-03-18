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
    
    public function Cidade(){
        return $this->belongsTo(Cidade::class, "cidade", "id");
    }

    public function Estado(){
        return $this->belongsTo(Estado::class, "estado", "id");
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

    public function analises(){
        return $this->hasMany(CreditoAnalise::class);
    }

    public function fazendas(){
        return $this->belongsToMany(Fazenda::class, "fazenda_clientes");
    }
}
