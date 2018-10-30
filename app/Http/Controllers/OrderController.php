<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
      $this->middleware('user');
    }

    public function storeSpanduk(Request $request)
    {
      $this->validator($request->all())->validate();

      $file = Auth::user()->email.'_'.time().'_'.$request->file('file')->getClientOriginalName();
      $request->file('file')->move(public_path().'/storage/orderan', $file);

      $user = User::find(Auth::user()->id);
      $user->phone = $request->phone;
      $user->sosmed = $request->sosmed;
      $user->save();

      Order::create([
        'client_id' => Auth::user()->id,
        'name' => 'Spanduk',
        'price' => \Config::get('price.spanduk'),
        'size_long' => $request->size_long,
        'size_wide' => $request->size_wide,
        'theme' => $request->theme,
        'content' => $request->content,
        'note' => $request->note,
        'file' => '/storage/orderan/'.$file,
        'created_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
        'updated_at' => Carbon::now()->setTimezone('Asia/Jakarta')
      ]);

      return view('user/home');
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
          'size_long' => 'required',
          'size_wide' => 'required',
          'theme' => 'required',
          'content' => 'required',
          'note' => 'required',
          'file' => 'required|mimes:jpeg,jpg,png,zip,rar|max:5000'
        ]);
    }


}
