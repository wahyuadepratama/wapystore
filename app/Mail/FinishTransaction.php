<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FinishTransaction extends Mailable
{
    use Queueable, SerializesModels;
    public $name;

    public function __construct($name)
    {
      $this->name = $name;
    }

    public function build()
    {
      $email = $this->from('official@wapydesign.com','Wapy Design'); // ---------------------------------  ubah disini
      $email->subject('Your Order has Arrived')->view('mail/finish-transaction')
                                                        ->with('name', $this->name);
    }
}
