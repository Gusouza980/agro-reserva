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

    public function preview(){
        return $this->belongsTo(MarketplaceProdutoImagem::class, "marketplace_produto_imagem_id", "id");
    }

    public function vendedor(){
        return $this->belongsTo(MarketplaceVendedor::class, "marketplace_vendedor_id", "id");
    }
}
