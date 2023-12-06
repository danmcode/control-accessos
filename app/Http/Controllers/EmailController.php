<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\EmailSender;
use Illuminate\Support\Facades\Log;

class EmailController extends Controller
{
    public static function sendEmail(
        string $mailTo,
        string $template,
        array $args = []
        ) : bool
    {
        try {
            Mail::to($mailTo)->send(new EmailSender($template, $args));
            return true;
        } catch (\Throwable $th) {
            Log::error("Error enviando correo:, Mensaje de error: {$th->getMessage()}");
            return false;
        }
    }
}
