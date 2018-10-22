<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{
    protected $table = 'municipio';
    protected $fillable = [
    	'id_municipio','municipio','id_depto'
     ];

   
}
