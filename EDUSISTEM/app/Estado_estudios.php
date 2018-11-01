<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado_estudios extends Model
{
   protected $table= "estado_estudios";
   protected $fillable=
   [
   	'id',
   	'datos_personales_id',
   	'estado',
   	'descripcion'
   ];
}
