<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Classes\EntregaTecnica\EntregaTecnica;

class SendMailUser extends Mailable
{
    use Queueable, SerializesModels;
    
    protected $toUser;
    protected $subjectTitle;
    protected $fromSend;
    protected $msg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($toUser, $fromSend, $msg, $subjectTitle)
    {
        $this->toUser = $toUser;
        $this->fromSend = $fromSend;
        $this->msg = $msg;
        $this->subjectTitle = $subjectTitle;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject($this->subjectTitle);
        $this->from($this->fromSend);
        $this->to($this->toUser);
        
        return $this->view('email.email', ['msg' => $this->msg]);
    }
}
