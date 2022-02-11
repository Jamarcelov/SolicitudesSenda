<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    protected $table = "solicitudes";

    public function usuarios(){
        return $this->belongsTo(Usuario::class);
    }
    public function servicios(){
        return $this->belongsTo(Servicio::class);
    }
    public function estados(){
        return $this->belongsTo(Estado::class);
    }
    public function solicitudepps(){
        return $this->hasMany(SolicitudEpp::class);
    }
}
