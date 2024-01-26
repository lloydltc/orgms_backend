<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use PhpParser\Node\Scalar\String_;

class UserPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $password;

    public function __construct(String $password)
    {
        $this->password = $password;
    }

    public function build(): UserPassword
    {
        return $this
            ->subject("Welcome to " . config('app.name') . "!")
            ->markdown('emails.user-password');
    }
}
