<?php

namespace App\Listeners;

use App\Events\SendEmailEvent;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendMailFired
{
    public function __construct()
    {
        //
    }

    public function handle(SendEmailEvent $event): void
    {
        $email = $event->email;
        $subject = $event->subject;
        $data['orderNo'] = $event->orderNo;
        Mail::send('emails.SendMail', $data, function($message) use ($email,$subject) {
            $message->to($email);
            $message->subject($subject);
        });
    }
}
