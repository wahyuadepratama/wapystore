<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PromoteEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $email;

    public function __construct($email)
    {
      $name = $name = preg_replace('/@.*?$/', '', $email);
      $this->email = $name;
    }

    public function build()
    {
      $email = $this->from('official@wapydesign.com','Wapy Design'); // ---------------------------------  ubah disini

      $email->subject('Desain Eksklusif! Dapatkan Discount Dengan Melakukan Registrasi')->view('mail/promote-email')
                                                                                        ->with('name', $this->email);
    }
}
