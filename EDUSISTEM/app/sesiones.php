<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sesiones extends Model
{
    protected $table = 'historial_sesiones';
    protected $fillable = ['id', 'users_id', 'created_at'];
}
