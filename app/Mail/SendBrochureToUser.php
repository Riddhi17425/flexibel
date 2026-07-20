<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendBrochureToUser extends Mailable
{
    use Queueable, SerializesModels;

    public function build()
    {
        return $this->subject('Thanx for your response')
                    ->view('front.email.user_brochure');
    }
}
