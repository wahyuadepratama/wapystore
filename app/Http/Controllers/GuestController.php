<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Models\Advice;
use App\Models\User;
use Carbon\Carbon;

class GuestController extends Controller
{
    public function index()
    {
      $visitor = Visitor::all();
      $found = false;
      foreach ($visitor as $key) {
        if($key->ip == $_SERVER['REMOTE_ADDR']){
          $found = true;
        }
      }

      if($found == false){
        Visitor::create([
          'ip' => $_SERVER['REMOTE_ADDR'],
          'created_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
          'updated_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
        ]);
      }

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

      if($request->email == ""){
        $request->email = "anonim";
      }

      if($request->name == ""){
        $request->name = "anonim";
      }

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
