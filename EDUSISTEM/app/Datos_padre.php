<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datos_padre extends Model
{
    protected $table ="datos_padre";
    protected $fillable = 
    [
    	'id',
    	'id_solicitante',
    	'identidad',
    	'nombre_completo',
    	'email',
    	'celular'
    ];
}
