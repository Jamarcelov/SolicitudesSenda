<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $table = "servicios";

    public function solicitudes(){
        return $this->hasMany(Solicitud::class);
    }
    public function categorias(){
        return $this->belongsTo(Categoria::class);
    }
}
