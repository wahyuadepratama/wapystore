<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\RegisterConfirmation;
use Illuminate\Http\Request;

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
            Mail::to("wahyuadepratam4@gmail.com")->send(new RegisterConfirmation(Auth::user()->email_confirmation, Auth::user()->name));
            return "email sudah dikirim";
          }else{
            return view('user/home');
          }

        }if(Auth::user()->role_id == 2){
          return view('designer/home');
        }else{
          return redirect('/root');
        }
    }
}
