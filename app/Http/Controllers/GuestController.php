<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Advice;
use App\Models\User;
use Carbon\Carbon;

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

    public function storeAdvice(Request $request)
    {
      $this->validatorAdvice($request->all())->validate();
      Advice::create([
        'email' => $request->email,
        'name' => $request->name,
        'message' => $request->message,
        'created_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
        'updated_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
      ]);

      return back()->with('success','Terima kasih sudah memberikan kritik dan sarannya ^_^');
    }

    public function validatorAdvice(array $data)
    {
        return Validator::make($data, [
          'message' => 'required'
        ]);
    }

    public function uploadDesign()
    {
      return redirect()->away('https://docs.google.com/forms/d/e/1FAIpQLScidJZ1Q2wtumjVJMtZyskBqbkXFWBnKfWTShEcCPu0hwDzPg/viewform?usp=sf_link');
    }
}
