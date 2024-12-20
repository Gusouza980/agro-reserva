<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    use HasFactory;

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function lote(){
        return $this->belongsTo(Lote::class);
    }

    public function embriao(){
        return $this->belongsTo(Embriao::class);
    }

}
