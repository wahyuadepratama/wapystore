<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderBroadcast extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $email = $this->from('official@wapydesign.com','Wapy Design'); // ---------------------------------  ubah disini

      // foreach($this->cart as $photo){
      //   $email->attach(public_path('storage/original_photo/'.$photo->photo->nama.'_'.$photo->path), [
      //       'as' => $photo->photo->nama.'_'.$photo->ukuran
      //   ]);
      // }

      $email->subject('You Get an Order Design')->view('mail/order-broadcast')->with('data',$this->data);
    }
}
