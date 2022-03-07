<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketplaceProduto extends Model
{
    use HasFactory;

    public function produtable(){
        return $this->morphTo();
    }

    public function imagens(){
        return $this->hasMany(MarketplaceProdutoImagem::class);
    }
}
