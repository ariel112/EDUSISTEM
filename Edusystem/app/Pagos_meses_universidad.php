<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagos_meses_universidad extends Model
{
   protected $table = "pagos_meses_universidad";
   protected $fillable = [
   	'id',
   	'universidad_id',
   	'01',
   	'02',
   	'03',
   	'04',
   	'05',
   	'06',
   	'07',
   	'08',
   	'09',
   	'10',
   	'11',
   	'12'   	
   	];
}
