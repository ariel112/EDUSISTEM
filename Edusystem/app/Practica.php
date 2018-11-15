<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Practica extends Model
{
    protected $table = "practica";
    protected $fillable = 
    [
    	'nombre',
    	'url',
    	'inicio',
    	'final',
    	'datos_personales_id'
    ];
}
