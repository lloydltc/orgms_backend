<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    public User $user;
    public string $password;

    public function __construct(User $user, string $password )
    {
        $this->password= $password;
        $this->user = $user;
    }

    public function build(): ForgotPassword
    {
        return $this
            ->subject("Welcome to " . config('app.name') . "!")
            ->markdown('emails.forgot-password');
    }
}
