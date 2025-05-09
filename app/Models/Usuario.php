<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $hidden = [
        "senha"
    ];

    public function assessor(){
        return $this->belongsTo(Assessor::class);
    }

    public function noticias(){
        return $this->hasMany(Noticia::class);
    }
}
