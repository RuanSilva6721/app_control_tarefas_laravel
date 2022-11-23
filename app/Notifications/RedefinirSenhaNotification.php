<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RedefinirSenhaNotification extends Notification
{
    use Queueable;
    public $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = 'htpp://localhost:8000/password/reset/'.$this->token;
        $minutos = config('auth.passwords.'.config('auth.defaults.passwords'));
        //dd($minutos);
        return (new MailMessage)
        ->subject('Atualização de senha')
        ->line('Esqueceu a senha?')
        ->action('Clique aqui para mudar esse crl!', $url)
        ->line('o linke expira em'.$minutos['expire'].' minutos')
        ->line('caso não tenha requisitado a alteração de senha, então nenhuma alteração será feita!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
