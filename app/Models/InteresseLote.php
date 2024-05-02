<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InteresseLote extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function lote(){
        return $this->belongsTo(Lote::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
