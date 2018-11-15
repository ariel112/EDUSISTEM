<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\sesiones;
use Carbon\Carbon;

class SuccessfulLogin
{



   public function __construct(){
           Carbon::setLocale('es');
                                 }
       

    
    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {   
         $carbon=Carbon::now();
        $sesiones = new sesiones();
        $sesiones->created_at= $carbon;
        $sesiones->users_id= $event->user->id;
        $sesiones->save();
        
    }
}
