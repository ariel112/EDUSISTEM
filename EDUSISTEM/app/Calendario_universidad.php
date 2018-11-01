<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendario_universidad extends Model
{
    protected $table ="calendario_universidad";
    protected $fillable = [
    	'universidad_id',
    	'periodo',
    	'inicio',
    	'solicitud_convenio',
    	'final',
    	'descripcion'       ];
}
