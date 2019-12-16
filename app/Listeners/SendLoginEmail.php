<?php

namespace App\Listeners;

use App\Events\UserLoggin;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;


use Illuminate\Support\Facades\Mail;
use App\Mail\UserWelcome;

class SendLoginEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserLoggin  $event
     * @return void
     */


    //Logica del evento del handle
    public function handle(UserLoggin $event)
    {

        //Accedemos al avent creado para este listener y accedemos a la variable user
        $user = $event->user;

        //Enviando email
        // to(email al cual se enviara)
        //send (Instancia de la clase que contiene el email)
        Mail::to($user['email'])->send(new UserWelcome($user));

    }
}
