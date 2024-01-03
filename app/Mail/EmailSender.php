<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Content;

class EmailSender extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public $view,
        public $data = []
    ){}

    public function content(): Content
    {
        return new Content(
            view: $this->view,
            with: $this->data,
        );
    }
}
