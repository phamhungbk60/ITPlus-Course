<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class SendRegisterEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $username;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        $this->username = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.register', [
            'name' => $this->username
        ])->subject('Welcome to my channel');
    }
}
