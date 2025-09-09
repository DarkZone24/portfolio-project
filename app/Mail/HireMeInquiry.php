<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\HireInquiry;

class HireMeInquiry extends Mailable
{
    use Queueable, SerializesModels;

    public $inquiry;

    public function __construct(HireInquiry $inquiry)
    {
        $this->inquiry = $inquiry;
    }

    public function build()
    {
        return $this->subject('New Hire Me Inquiry - ' . $this->inquiry->name)
                   ->view('emails.hire-me-inquiry')
                   ->with([
                       'inquiryData' => $this->inquiry
                   ]);
    }
}
