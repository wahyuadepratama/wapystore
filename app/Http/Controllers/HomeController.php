<?php

namespace App\Http\Controllers;

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
          if(Auth::user()->verified != true){
            Mail::to(Auth::user()->email)->send(new RegisterConfirmation(Auth::user()->email_confirmation, Auth::user()->name));
          }

          $orderan  = Order::where('client_id',Auth::user()->id)->orderBy('created_at', 'desc')->get();
          $user     = User::with('discount')->where('id',Auth::user()->id)->first();
          return view('user/home')->with('orderan', $orderan)->with('user',$user);

        }if(Auth::user()->role_id == 2){

          $orderan  = Transaction::with('order')->with('user')->orderBy('created_at', 'desc')->get();
          return view('designer/home')->with('job', $orderan);

        }else{

          return redirect('/root');

        }
    }
}
