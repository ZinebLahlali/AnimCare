<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RendezVousNotification extends Notification
{
    use Queueable;
    private $userName;
    private $content;
    private $rendezvous_id;
   


    /**
     * Create a new notification instance.
     */
    public function __construct($userName, $content, $rendezvous_id)
    {
  
        $this->userName = $userName;
        $this->content = $content;
        $this->rendezvous_id = $rendezvous_id;
       
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    // public function toMail(object $notifiable): MailMessage
    // {
    //     return (new MailMessage)
    //         ->line('The introduction to the notification.')
    //         ->action('Notification Action', url('/'))
    //         ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'userName' => $this->userName,
            'content' => $this->content,
            'rendezvous_id' => $this->rendezvous_id
        ];
    }
}
