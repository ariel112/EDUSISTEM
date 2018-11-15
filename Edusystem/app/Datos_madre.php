<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datos_madre extends Model
{
    protected $table ="datos_madre";
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
