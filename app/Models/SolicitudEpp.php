<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudEpp extends Model
{
    use HasFactory;

    protected $table = "solicitudepps";

    public function solicitudes(){
        return $this->belongsTo(Solicitud::class);
    }
}
