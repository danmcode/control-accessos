<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomNotification extends Notification
{
    use Queueable;

    private $permission_id;
    private $collaborator_id;
    private $status_auth;

    /**
     * Create a new notification instance.
     */
    public function __construct($permission_id, $collaborator_id, $status_auth)
    {
        $this->permission_id = $permission_id;
        $this->collaborator_id = $collaborator_id;
        $this->status_auth = $status_auth;
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
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    public function toDatabase($notifiable)
    {
        return [
            'permission_id' => $this->permission_id,
            'collaborator_id' => $this->collaborator_id,
            'status_auth' => $this->status_auth
        ];
    }
}
