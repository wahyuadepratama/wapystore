<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Order;

class DesignerController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('designer');
  }

  public function indexJob()
  {
    $job = Order::with('user')->where('status','waiting')->orderBy('created_at', 'desc')->get();
    return view('designer/job')->with('orderan',$job);
  }

  public function indexJobProgress()
  {
    $job = Order::with('user')->where('status','on-progress')->orderBy('created_at', 'desc')->get();
    return view('designer/job')->with('orderan',$job);
  }
}
