<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\RegisterConfirmation;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Order;
use App\Models\User;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->role_id == 3){
          $orderan  = Order::where('client_id',Auth::user()->id)->orderBy('created_at', 'desc')->get();
          $user     = User::with('discount')->where('id',Auth::user()->id)->first();
          return view('user/home')->with('orderan', $orderan)->with('user',$user);
        }
        if(Auth::user()->role_id == 2){
          $orderan  = Transaction::with('order')->with('user')->orderBy('created_at', 'desc')->get();
          return view('designer/home')->with('job', $orderan);
        }else{
          return redirect('/root');
        }
    }

    public function resendEmail()
    {
      if(Auth::user()->verified != true){
        Mail::to(Auth::user()->email)->send(new RegisterConfirmation(Auth::user()->email_confirmation, Auth::user()->name));
      }
      return back();
    }

    public function changePassword()
    {
      return view('auth/password-reset');
    }

    public function storeChangePassword(Request $request)
    {
      $this->validator($request->all())->validate();
      $user = User::find(Auth::user()->id);
      $user->password = bcrypt($request->password);
      $user->save();
      return redirect('/home')->with('success','You have successfully change your password!');
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
          'password' => 'required|string|min:6|confirmed',
        ]);
    }
}
