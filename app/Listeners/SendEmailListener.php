<?php

namespace App\Listeners;

use App\Events\SendEmailEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailListener implements ShouldQueue
{
    public function handle(SendEmailEvent $event)
    {
        // Use the dynamic values from the event to send the email
        $email = $event->email;
        $subject = $event->subject;
        $data = $event->data;

        // Send email logic here
        // Mail::send($event->view, $data, function ($mail) use ($email, $subject) {
        Mail::send($event->view, ['data' => $data], function ($mail) use ($email, $subject) {
            $mail->to($email)
                ->subject($subject);
        });
    }
}
