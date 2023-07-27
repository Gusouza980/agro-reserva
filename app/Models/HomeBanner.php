<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class HomeBanner extends Model
{
    use HasFactory;

    protected static function boot(){
        parent::boot();

        static::deleting(function($banner){
            Storage::delete($banner->caminho);
            Storage::delete($banner->caminho_mobile);
            cache()->forget("banners");
        });

        static::updating(function($banner){
            cache()->forget("banners");
        });

        static::creating(function($banner){
            cache()->forget("banners");
        });
    }
}
