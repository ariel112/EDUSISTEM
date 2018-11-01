<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ficha_documentos extends Model
{
    protected $table= "ficha_documentos";
    protected $fillable = 
    [
    	'id',
    	'url',
    	'Datos_personales_id'
    ];
}
