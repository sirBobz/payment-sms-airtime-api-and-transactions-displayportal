<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ActivateNewUser extends Notification implements ShouldQueue
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
        $developer_url = 'https://docs.statum.co.ke';
        $service_pricing = 'https://www.statum.co.ke/service-pricing';
        $verify_url = url('/verify/account/' . $this->user->email);

        return (new MailMessage)
                    ->subject('Welcome to Statum!')
                    ->greeting('Hello ' . $this->user->name . ',')
                    ->line('To get started on Statum, kindly verify your email address by clicking the button below.')
                    ->action('Verify', $verify_url)
                    ->line('Once you are ready to integrate our APIs, we recommend that you go through our developer resources on ' . $developer_url . '.')
                    ->line('We have also provided a dashboard that you can use to view your API activity and request for products.')
                    ->line('Our service pricing are found on ' . $service_pricing . '.')
                    ->line('We cannot wait to see what you build!');
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
