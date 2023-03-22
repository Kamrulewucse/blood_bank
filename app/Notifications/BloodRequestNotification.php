<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BloodRequestNotification extends Notification
{
    use Queueable;
    public $requestDetails;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($requestDetails)
    {
        $this->requestDetails = $requestDetails;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return $this->requestDetails;
    }
}
