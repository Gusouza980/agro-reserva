<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Embriao extends Model
{
    use HasFactory;

    public function reserva(){
        return $this->belongsTo(Reserva::class);
    }

    public function fazenda(){
        return $this->belongsTo(Fazenda::class);
    }

    public function precos(){
        return $this->hasMany(EmbriaoPreco::class);
    }

    public function raca(){
        return $this->belongsTo(Raca::class);
    }
}
