<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmPayment extends Mailable
{
  use Queueable, SerializesModels;
  public $name;
  public $data;

  public function __construct($name, $data)
  {
    $this->name = $name;
    $this->data = $data;
  }

  public function build()
  {
    $email = $this->from('official@wapydesign.com','Wapy Design'); // ---------------------------------  ubah disini
    $email->subject('Pembayaran Berhasil')->view('mail/confirm-payment')
                                                      ->with('name', $this->name)
                                                      ->with('data',$this->data);
  }
}
