<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raca extends Model
{
    use HasFactory;

    public function clientes(){
        return $this->belongsToMany(Cliente::class, 'cliente_racas');
    }
}
