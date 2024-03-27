<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Auth\User;


class CreateChat extends Notification
{
    use Queueable;

    private $chat;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($chat)
    {
        $this->chat = $chat;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $sender_id = $this->chat->created_by;
        $from = User::find($sender_id);
        return (new MailMessage)
                    ->line('A new message received from '.$from->name)
                    ->action('View Chat', url('chats/'.$this->chat->chat_id))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $array = $this->chat->toArray();
        return $array;
    }
}
