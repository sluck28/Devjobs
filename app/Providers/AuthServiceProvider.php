<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //para modificar el correo de autenticación
        VerifyEmail::toMailUsing(function($notifiable, $url){
            return (new MailMessage)

            ->subject('Verificar Cuenta')
            ->line('Tu cuenta esta casi lista, solo da click en el siguiente enlace a continuacion')
            //creamos el boton
            ->action('Confirmar cuenta',$url)
            //para crear mensajes 
            ->line('si no creaste esta cuenta, puedes ignorar este mensaje');

            
        });
    }
}
