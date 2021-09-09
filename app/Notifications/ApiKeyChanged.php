<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApiKeyChanged extends Notification implements ShouldQueue
{
    use Queueable;

    public $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
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
        return (new MailMessage)
                    ->subject('API credentials generated')
                    ->greeting('Hello ' . $this->user->name . ',')
                    ->line('The api credentials on your account were recently changed.')
                    ->line('If this was you, great! There\'s nothing else you need to do.')
                    ->line('If this wasn\'t you, your account may have been compromised and you should take a few steps to make sure your account is secure. To start, reset your password and API credentials now.');

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
