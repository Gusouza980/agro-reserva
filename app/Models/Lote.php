<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    use HasFactory;

    public function raca(){
        return $this->belongsTo(Raca::class);
    }

    public function membros(){
        return $this->hasMany(Lote::class, "pacote_id", "id");
    }

    public function fazenda(){
        return $this->belongsTo(Fazenda::class);
    }

    public function carrinhos(){
        return $this->belongsToMany(Carrinho::class, 'carrinho_produtos');
    }

    public function curtidas(){
        return $this->hasMany(CurtidaLote::class);
    }

    public function visitas(){
        return $this->hasMany(Visita::class);
    }

    public function reserva(){
        return $this->belongsTo(Reserva::class);
    }
}
