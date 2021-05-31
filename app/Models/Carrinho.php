<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    use HasFactory;

    public function produtos(){
        return $this->hasMany(CarrinhoProduto::class);
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function venda(){
        return $this->hasOne(Venda::class);
    }
}
