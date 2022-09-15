<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketplaceVendedor extends Model
{
    use HasFactory;

    public function produtos(){
        return $this->hasMany(MarketplaceProduto::class);
    }

    // public function getBySlug($slug){
    //     return $this->where("")
    // }
}
