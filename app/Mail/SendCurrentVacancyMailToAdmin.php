<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendCurrentVacancyMailToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $data; 

   public function __construct($jobData)
    {
        $this->data = $jobData; 
    }

   public function build()
{
    $email = $this->subject('New Current Vacancy Form Submission')
                  ->view('front.email.currentvacancy_admin')
                  ->with('data', $this->data);

    if (!empty($this->data['resume'])) {
        $resumeFullPath = public_path($this->data['resume']);  // Full server path to file

        if (file_exists($resumeFullPath)) {
            $email->attach($resumeFullPath, [
                'as' => basename($resumeFullPath),
                'mime' => mime_content_type($resumeFullPath),
            ]);
        }
    }

    return $email;
}

}
