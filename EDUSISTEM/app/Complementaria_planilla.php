<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complementaria_planilla extends Model
{
    protected $table= "planilla_completemtaria";

    protected $fillable =
    [
    	'id',
    	'datos_personales_id',
    	'users_id',
    	'created_at',
    	'updated_at',
    	'fecha',
    	'observacion'
    ];
}
