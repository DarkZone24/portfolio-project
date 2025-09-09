<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\HireInquiry;

class HireMeAutoReply extends Mailable
{
    use Queueable, SerializesModels;

    public $inquiry;

    public function __construct(HireInquiry $inquiry)
    {
        $this->inquiry = $inquiry;
    }

    public function build()
    {
        return $this->subject('Thank you for your inquiry!')
                   ->view('emails.hire-me-auto-reply')
                   ->with([
                       'inquiryData' => $this->inquiry
                   ]);
    }
}
