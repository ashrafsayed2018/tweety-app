<?php

namespace App\Notifications;

use App\Tweet;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewLikeAdded extends Notification
{
    use Queueable;

    /**
    * like a tweet
    * @var $tweet
    */

    public $tweet;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Tweet $tweet)
    {

        $this->tweet = $tweet;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        $body =  $this->tweet->body;
        return (new MailMessage)
                    ->subject('your tweet get liked')
                    ->greeting('hello man')
                    ->line("a new like is add to your tweet :   $body")
                    ->action('View the tweet', route('home'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'tweet' => $this->tweet
        ];
    }
}
