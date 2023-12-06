<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\EmailConfig;

class EmailSender extends Mailable
{
    use Queueable, SerializesModels;

    public function build(String $template, array $args = []): EmailSender
    {
        $config = EmailConfig::getEmailConfig();

        return $this->view($template)
            ->with($args);
    }
}
