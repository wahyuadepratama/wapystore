<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterConfirmation extends Mailable
{
    use Queueable, SerializesModels;
    public $token;
    public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token, $name)
    {
        $this->token = $token;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $email = $this->from('official@stockies.id','Wapy Design'); // ---------------------------------  ubah disini

      // foreach($this->cart as $photo){
      //   $email->attach(public_path('storage/original_photo/'.$photo->photo->nama.'_'.$photo->path), [
      //       'as' => $photo->photo->nama.'_'.$photo->ukuran
      //   ]);
      // }

      $email->subject('Email Confirmation')->view('auth/confirmation')
                                          ->with('token',$this->token)
                                          ->with('name',$this->name);
    }
}
