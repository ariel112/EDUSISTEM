<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nombre_complementaria extends Model
{
    protected $table= "nombre_complementaria";
    protected $fillable = 
    [
    	'id',
    	'users_id',
    	'descripcion',
    	'nombre',
    	'estado'
    ];
}
