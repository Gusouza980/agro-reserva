<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    public function lotes(){
        return $this->hasMany(Lote::class);
    }

    public function embrioes(){
        return $this->hasMany(Embriao::class);
    }

    public function fazenda(){
        return $this->belongsTo(Fazenda::class);
    }
}
