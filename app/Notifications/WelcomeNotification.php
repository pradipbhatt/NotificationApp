<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class WelcomeNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct()
    {
        //
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('Hello ' . $notifiable->name . '!')
            ->subject('Welcome to Laravel Notifications')
            ->line('Thank you for joining our application.')
            ->action('Visit Website', url('/'))
            ->line('We appreciate your support!');
    }
}
