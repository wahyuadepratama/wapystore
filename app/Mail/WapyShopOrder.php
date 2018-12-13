<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WapyShopOrder extends Mailable
{
  use Queueable, SerializesModels;
  public $name;
  public $data;
  public $product;

  public function __construct($name, $data, $product)
  {
    $this->name = $name;
    $this->data = $data;
    $this->product = $product;
  }

  public function build()
  {
    $email = $this->from('official@wapydesign.com','Wapy Shop'); // ---------------------------------  ubah disini
    $email->subject('Konfirmasi Pesanan '.$this->product)->view('shop/mail-order')
                                                      ->with('name', $this->name)
                                                      ->with('price',$this->data);
  }
}
