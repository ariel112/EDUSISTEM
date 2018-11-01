<?php

namespace App\Reportes;

use Illuminate\Database\Eloquent\Model;

class Users_has_becas extends Model
{
    protected $table = "users_has_becas";
    protected $fillable =['id','tipo_accion_id','users_id','becas_id'];
}
