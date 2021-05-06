<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RegisterEmail extends Notification
{
    use Queueable;

    private $data;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
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
                    ->line('Thank you for submittion.')
                    ->line('Click this button to continue to register!')
                    ->action('Register', route('registerPage',['email' => $this->encryptEmail($this->data), 'mail' => $this->data->email]))
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
        return [
            //
        ];
    }

    /**
     * Custom Funtion
     *
     * Encrypt the email and pass it to the url
     *
     */
    public function encryptEmail($data)
    {
        $enc = openssl_encrypt($data->email, env('ENCRYPT_CIPHER'),env('ENCRYPT_KEY'),0,env('ENCRYPRION_IV'));
        $enc = str_replace("/",'slash', $enc);
        return $enc;
    }
}
