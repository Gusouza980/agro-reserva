<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketplaceCategoria extends Model
{
    use HasFactory;

    public function produtos(){
        return $this->hasMany(MarketplaceProduto::class);
    }

    public function categoria(){
        return $this->belongsTo(MarketplaceCategoria::class, "marketplace_categoria_id", "id");
    }
}
