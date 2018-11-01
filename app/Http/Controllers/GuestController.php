<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class GuestController extends Controller
{
    public function index()
    {
      return view('guest.index');
    }

    public function confirmation($token)
    {
      $user = User::where('email_confirmation',$token)->first();
      if($user){
        $user->verified = true;
        $user->discount_id = 2;
        $user->save();
      }
      return view("guest/verified");
    }
}
