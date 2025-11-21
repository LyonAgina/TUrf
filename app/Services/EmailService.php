<?php
namespace App\Services;

use Illuminate\Support\Facades\Mail;

class EmailService
{
    /**
     * Send an email notification to a recipient.
     *
     * @param string $to Recipient email address
     * @param string $subject Email subject
     * @param string $message Email body
     * @return void
     */
    public function send($to, $subject, $message)
    {
        Mail::raw($message, function ($mail) use ($to, $subject) {
            $mail->to($to)
                ->subject($subject);
        });
    }
}
