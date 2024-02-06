<?php

namespace App\Notifications;

use App\Models\Category;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CategoryCreatedNotification extends Notification
{
    use Queueable;


    protected $category;

    /**
     * Create a new notification instance.
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {

        return (new MailMessage)
            ->subject('Category created')
            ->greeting("Hello {$notifiable->name},")
            ->line("The category {$this->category->name} was created")
            ->action('View Category Posts', url('/categories/' . $this->category->id));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
