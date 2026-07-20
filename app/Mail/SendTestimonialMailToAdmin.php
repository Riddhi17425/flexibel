<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendTestimonialMailToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $data; 

   public function __construct($testimonialData)
    {
        $this->data = $testimonialData; 
    }

    public function build()
    {
        return $this->subject('New Testimonial Form Submission')
                    ->view('front.email.testimonial_admin')
                    ->with('data', $this->data);
    }
}
