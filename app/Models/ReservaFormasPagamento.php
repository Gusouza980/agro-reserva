<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaFormasPagamento extends Model
{
    use HasFactory;

    public function regras(){
        return $this->hasMany(ReservaFormasPagamentoRegra::class);
    }
}
