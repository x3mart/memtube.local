<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPassword extends Notification
{
    use Queueable;

    /**
     * The password reset token.
     *
     * @var string
     */
     public $token;

     /**
      * The callback that should be used to create the reset password URL.
      *
      * @var \Closure|null
      */
     public static $createUrlCallback;
 
     /**
      * The callback that should be used to build the mail message.
      *
      * @var \Closure|null
      */
     public static $toMailCallback;
 
     /**
      * Create a notification instance.
      *
      * @param  string  $token
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
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }

        if (static::$createUrlCallback) {
            $url = call_user_func(static::$createUrlCallback, $notifiable, $this->token);
        } else {
            $url = url(route('password.reset', [
                'token' => $this->token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false));
        }

        return (new MailMessage)
            ->subject(('Сброс пароля'))
            ->line(('Вы получили это письмо потому,  что мы получили запрос на сброс пароля.'))
            ->action(('Сбросить пароль'), $url)
            ->line('Ссылка станет бесполезной через : 60 минут.')
            ->line(('Если вы не запрашивали сброс пароля на memtube.ru - просто удалите это письмо.'));
    }

    /**
     * Set a callback that should be used when creating the reset password button URL.
     *
     * @param  \Closure  $callback
     * @return void
     */
     public static function createUrlUsing($callback)
     {
         static::$createUrlCallback = $callback;
     }
 
     /**
      * Set a callback that should be used when building the notification mail message.
      *
      * @param  \Closure  $callback
      * @return void
      */
     public static function toMailUsing($callback)
     {
         static::$toMailCallback = $callback;
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
