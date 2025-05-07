<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boleto extends Model
{
    use HasFactory;

    public function fazendeiro(){
        return $this->belongsTo(Fazendeiro::class);
    }

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }
}
