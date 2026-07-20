<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendCaseStudyMailToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $data; 

   public function __construct($casestudyData)
    {
        $this->data = $casestudyData; 
    }

    public function build()
    {
        return $this->subject('New Case-study Form Submission')
                    ->view('front.email.casestudy_admin')
                    ->with('data', $this->data);
    }
}
