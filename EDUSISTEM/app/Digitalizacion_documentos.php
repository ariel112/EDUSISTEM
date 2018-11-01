<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Digitalizacion_documentos extends Model
{
    protected $table = "digitalizacion_documentos";
    protected $fillable = 
    [ 
    	'id',
    	'datos_personales',
    	'url',
    	'periodo',
    	'anio'
    ];
}
