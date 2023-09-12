<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    /**
     * Handle the incoming request.
     */

     

    public function __invoke(Request $request)
    {   
        //usamos unreadNotifications para que imprima solo las notificaciones que no a leido el usuario
        $notificaciones=auth()->user()->unreadNotifications;

        //limpiar notificacion
        auth()->user()->unreadNotifications->markAsRead();  

        return view('notificaciones.index',[
            'notificaciones' => $notificaciones

        ]);
    }
}
