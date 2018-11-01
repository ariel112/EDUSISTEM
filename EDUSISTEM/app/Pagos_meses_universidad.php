<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagos_meses_universidad extends Model
{
   protected $table = "pagos_meses_universidad";
   protected $fillable = [
   	'id',
   	'universidad_id',
   	'enero',
   	'febrero',
   	'marzo',
   	'abril',
   	'mayo',
   	'junio',
   	'julio',
   	'agosto',
   	'septiembre',
   	'octubre',
   	'noviembre',
   	'diciembre'   	
   	];
}
