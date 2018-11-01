<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datos_personales_has_carreras extends Model
{
    protected $table = "datos_personales_has_carreras";
    protected $fillable = ['id', 'id_datos_personales','carrera_id', 'created_at', 'updated_at'];
}
