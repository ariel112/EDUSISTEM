<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];




    
      /*-------------------------------------------codigo para las autentifiacion---------------------------------*/

    public function formacion(){
        return $this->type==='Gerencia de Formacion y Capacitacion';
    }

    public function liderazgo(){
        return $this->type=='Gerencia de Formacion y Liderazgo';
    }

    public function compromiso(){
        return $this->type==='Gerencia de Compromiso Social y Juvenil';
    }

    public function monitoreo(){
        return $this->type==='Gerencia de Monitoreo y Evaluacion';
    }

    public function planilla(){
        return $this->type==='Gerencia Planilla';
    }

    public function contabilidad(){
        return $this->type==='Gerencia Contabilidad';
    }

    public function operaciones(){
        return $this->type==='Operaciones';
    }
    public function administrador(){
        return $this->type==='Administrador';
    }


  












    
}
