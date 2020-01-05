<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class tutorialsCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $tutorials;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($tutorials)
    {
        //
        $this->tutorials = $tutorials; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mailTest');
    }
}
