<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FazendaAvaliacao extends Model
{
    use HasFactory;

    public function fazenda(){
        return $this->belongsTo(Fazenda::class);
    }
}
