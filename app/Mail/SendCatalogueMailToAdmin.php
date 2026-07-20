<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendCatalogueMailToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $data; 

   public function __construct($catalogueData)
    {
        $this->data = $catalogueData; 
    }

    public function build()
    {
        return $this->subject('Brochure Download Request')
                    ->view('front.email.catalogue_admin')
                    ->with('data', $this->data);
    }
}
