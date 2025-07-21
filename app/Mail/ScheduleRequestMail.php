<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ScheduleRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $user;
    public $appointmentdates;
    public function __construct($user, $appointmentdates=["2023-10-01", "2023-10-02", "2023-10-03"])
    {
        $this->user = $user;
        $this->appointmentdates = $appointmentdates;
    }

    

    public function build()
    {
        return $this->subject('Schedule Request Mail')
                    ->view('emails.schedule_request');
    }
}
