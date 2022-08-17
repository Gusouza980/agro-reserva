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

    public function chaves(){
        return $this->belongsToMany(Chave::class, "lote_chaves", "lote_id", "chave_id");
    }

    public function recomendados(){
        return $this->belongsToMany(Lote::class, "lote_recomendacaos", "lote_id", "lote_recomendado_id");
    }

    public function lances(){
        return $this->hasMany(Lance::class);
    }

    public function produto(){
        return $this->morphOne(Produto::class, "produtable");
    }
}
