<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actualizacion_periodo extends Model
{
   protected $table = "actualizacion_periodo";
   protected $fillable = [
   	'id_datos_personales',
   	'calendario_universidad_id',
   	'promedio_global',
   	'promedio_periodo'

   	];
}
