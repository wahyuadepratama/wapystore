<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailistPromoteEmail extends Mailable
{
  use Queueable, SerializesModels;
  public $email;
  public $subject;
  public $body;

  public function __construct($email, $subject, $body)
  {
    $name = $name = preg_replace('/@.*?$/', '', $email);
    $this->email = $name;
    $this->subject = $subject;
    $this->body = $body;
  }

  public function build()
  {
    $email = $this->from('official@wapydesign.com','Wapy Design'); // ---------------------------------  ubah disini

    $email->subject($this->subject)->view('mail/mailist-promote-email')
                                  ->with('name', $this->email)
                                  ->with('body', $this->body);
  }
}
