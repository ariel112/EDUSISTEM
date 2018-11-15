<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datos_personales extends Model
{
    protected $table = "datos_personales";

    protected $fillable = [
    	'id',
    	'id_cargo',
    	'id_municipio',
    	'genero',
    	'estado_civil',
    	'id_padre',
    	'id_madre',
    	'id_laboral',
    	'id_extracurr',
    	'id_grupo_becarios',
    	'id_banco',
    	'id_documentos',
    	'id_estado_estudios',
    	'identidad',
    	'nombre',
    	'fecha_nacimiento',
    	'discapacidad',
    	'ciudad',
    	'ciudad_res',
    	'colonia',
    	'bloque',
    	'casa',
    	'referenciaDir',
    	'cod_postal',
    	'telefono',
    	'celular',
    	'num_whatsapp',
    	'email',
    	'passw',
    	'longitud',
    	'latitud',
    	'departamento_residencia',
    	'becas_id',
    	'cuenta_universitaria',
        'estado_estudios',
        'fecha_estado_estudios',
        'practica',
        'practica_inicio',
        'practica_fin',
        'estado_practica',
        'retencion_inicio',
        'retencion_final'
    	];
}
