<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demanda extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function solicitante(){
        return $this->belongsTo(Usuario::class, "solicitante_id", "id");
    }

    public function solicitado(){
        return $this->belongsTo(Usuario::class, "solicitado_id", "id");
    }
}
