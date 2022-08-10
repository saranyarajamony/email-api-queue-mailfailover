<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Library\EmailAttributes;


/**
 * Implements ShouldQueue to enable job queueing.
 * */
class DynamicMailer extends Mailable implements ShouldQueue
{
    use  Queueable, SerializesModels;
    
    public $emailAttributes;

    // number of times the job may be attempted
    public $tries = 3;

    // job is considered as failed on timeout
    public $failOnTimeout = true;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(EmailAttributes $ea)
    {
        //If your mailable depends on the model, unexpected errors can occur when the job
        // that sends the queued mailable is processed before the commit.
        $this->afterCommit();

        $this->emailAttributes = $ea;
    }

    /**
     * Build the mail content using the template
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.dynamicMail')
        ->from($this->emailAttributes->from, $this->emailAttributes->subject)
        ->subject($this->emailAttributes->subject)
        ->with('emailSubject', $this->emailAttributes->subject)
        ->with('emailContent', $this->emailAttributes->content)
        ->with('mailOpener', ucwords($this->emailAttributes->name));
    }
}
