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

    public function fazenda(){
        return $this->belongsTo(Fazenda::class);
    }
}
