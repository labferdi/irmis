<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\User;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.forgot-password')
                    ->subject('Reset Password Notification')
                    ->from('noreply@masjidibnusabil.com', 'Masjid Ibnu Sabil')
                    ->with([
                        'user_name' => $this->user->name,
                        'url' => route('cms-reset-password', ['token' => $this->token])
                    ]);;
    }
}
