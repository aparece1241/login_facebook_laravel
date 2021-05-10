<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Session;

class ResetPasswordNotif extends Notification
{
    use Queueable;

    protected $data;
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
        $this->encryptEmail($this->data);
        return (new MailMessage)
                    ->line('Reset Password')
                    ->line('Note: This link will expire in 2 minutes')
                    ->action('Reset Password', url('/reset-password/'. $this->data->email))
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
        Session::put('token_reset_pwd', ['data' => $enc, 'exp' => Carbon::now()->addMinutes(2)]);
        return $enc;
    }
}
