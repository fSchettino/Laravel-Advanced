<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvoicePaid extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // We can add different notification channels (some channel, such as slack or SMS, needs a package to be installed).
        // Each channel needs a notification method whose name has following naming convention:
        // to + channel name (ex. notification channel: database - method name: toDatabase)
        //return ['mail', 'database'];

        // $notifiable is a user actually.
        dump($notifiable);

        // Being a user, $notifiable has a notification_preference attribute which we created through migration.
        dump($notifiable->notification_preference);

        // So we can return an array of notification user preferences instead of a static array.
        return explode(', ', $notifiable->notification_preference);
    }

    // Mail channel method
    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    // Database channel method

    /**
     * @param $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        // Data stored in data column of notifications database table
        return [
            'amount' => 1000,
            'action' => 'Click here to pay invoice'
        ];
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
