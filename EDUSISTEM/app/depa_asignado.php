<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class depa_asignado extends Model
{

	protected $table="depa_asignado";
    protected $fillable =
    [ 'created_at', 'users_id','departamento_id_depto','estado'  ];
}
