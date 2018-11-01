<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Becas extends Model
{
    protected $table = "becas";
    protected $fillable = ['id','nombre','monto','descripcion'];
}
