<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarrinhoProduto extends Model
{
    use HasFactory;

    public function lote(){
        return $this->belongsTo(Lote::class);
    }

    public function carrinho(){
        return $this->belongsTo(Carrinho::class);
    }
}
