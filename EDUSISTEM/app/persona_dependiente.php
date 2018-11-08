<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class persona_dependiente extends Model
{
    protected $table ="persona_dependiente";
    protected $fillable = 
    [
    	
    	'id_datos_personales',
    	'identidad',
    	'nombre_completo',
    	'email',
    	'parentesco',
        'id',
    	'celular'
    ];
}
