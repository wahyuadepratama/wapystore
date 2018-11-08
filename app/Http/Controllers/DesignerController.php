<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\HistoryTransaction;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;

class DesignerController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('designer');
  }

  public function indexHistory()
  {
    $mutation = HistoryTransaction::all();
    return view('designer/history')->with('mutation',$mutation);
  }

  public function indexJob()
  {
    $job = Order::with('user')->where('status','waiting')->orderBy('created_at', 'desc')->paginate(5);
    return view('designer/job')->with('orderan',$job);
  }

  public function indexJobProgress()
  {
    $job = Transaction::with('order','user')->whereHas('order',function($query){
            $query->where('status','=','on_progress');
          })->orderBy('created_at', 'desc')->paginate(5);
    return view('designer/job-progress')->with('orderan',$job);
  }

  public function indexJobRevision()
  {
    $job = Transaction::with('order','user')->whereHas('order',function($query){
            $query->where('status','=','revision');
          })->orderBy('created_at', 'desc')->paginate(5);
    return view('designer/job-progress')->with('orderan',$job);
  }

  public function indexJobClosed()
  {
    $job = Transaction::with('order','user')->whereHas('order',function($query){
            $query->where('status','=','done');
          })->orderBy('created_at', 'desc')->paginate(5);
    return view('designer/job-progress')->with('orderan',$job);
  }

  public function takeJob($id)
  {
    Transaction::create([
      'designer_id' => Auth::user()->id,
      'order_id'=> $id,
      'created_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
      'updated_at' => Carbon::now()->setTimezone('Asia/Jakarta')
    ]);

    $order = Order::find($id);
    $order->status = 'on_progress';
    $order->updated_at = Carbon::now()->setTimezone('Asia/Jakarta');
    $order->save();

    return back()->with('success','You have successfully taken this job!');
  }
}
