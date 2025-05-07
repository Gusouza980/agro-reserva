<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Reserva extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected static function boot(){
        parent::boot();

        static::deleting(function($reserva){
            cache()->forget("reservas_ativas");
        });

        static::updating(function($reserva){
            cache()->forget("reservas_ativas");
        });

        static::creating(function($reserva){
            cache()->forget("reservas_ativas");
        });
    }

    public function lotes(){
        return $this->hasMany(Lote::class);
    }

    public function embrioes(){
        return $this->hasMany(Embriao::class);
    }

    public function fazenda(){
        return $this->belongsTo(Fazenda::class);
    }

    public function formas_pagamento(){
        return $this->hasMany(ReservaFormasPagamento::class);
    }
}
