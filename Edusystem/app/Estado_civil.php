<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado_civil extends Model
{
    protected $table ="estado_civil";

    protected $fillable = ['id','estado_civil'];
}
