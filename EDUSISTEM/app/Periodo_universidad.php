<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo_universidad extends Model
{
    protected $table = "periodo_universidad";
    protected $fillable = ['id', 'nombre','universidad_id'];
}
