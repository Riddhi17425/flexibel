<?php

namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;

class EnquiryFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $formData;
    public $fileUrl;

public function __construct($formData, $fileUrl)
{
    $this->formData = $formData;
    $this->fileUrl = $fileUrl;
}

    public function build()
    {
        // Generate PDF
        return $this->view('front.email.enquiry')
                ->with([
                    'data' => $this->formData,
                    'fileUrl' => $this->fileUrl,
                ]);
                
        $email = $this->view('front.email.enquiry')
                    ->with([
                        'data' => $this->formData,
                        'fileUrl' => $this->fileUrl,
                    ]);

        if ($this->fileUrl && file_exists(public_path($this->fileUrl))) {
            $email->attach(public_path($this->fileUrl));
        }

        return $email;
    }
}
