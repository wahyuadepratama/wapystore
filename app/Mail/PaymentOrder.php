<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PaymentOrder extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $order_name;
    public $order_price;

    public function __construct($name, $order_name, $order_price)
    {
        $this->name = $name;
        $this->order_name = $order_name;
        $this->order_price = $order_price;
    }

    public function build()
    {
      $email = $this->from('official@wapydesign.com','Wapy Design'); // ---------------------------------  ubah disini

      $email->subject('Order Information')->view('mail/finish-order')
                                          ->with('name', $this->name)
                                          ->with('order_name', $this->order_name)
                                          ->with('order_price', $this->order_price);
    }
}
