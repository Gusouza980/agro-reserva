<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fazenda extends Model
{
    use HasFactory;

    public function depoimentos(){
        return $this->hasMany(Depoimento::class);
    }

    public function producoes(){
        return $this->hasMany(Producao::class);
    }

    public function lotes(){
        return $this->hasMany(Lote::class);
    }

    public function usuarios(){
        return $this->hasMany(Fazendeiro::class);
    }

    public function vendas(){
        return $this->hasMany(Venda::class);
    }

    public function reservas(){
        return $this->hasMany(Reserva::class);
    }
}
