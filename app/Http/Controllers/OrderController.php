<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\OrderBroadcast;
use App\Models\ThemePhoto;
use App\Models\Discount;
use App\Models\Theme;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
      $this->middleware('user');
    }

    public function orderSpanduk()
    {
      return view('user/order-spanduk')->with('theme', $this->getTheme());
    }

    public function orderPoster()
    {
      return view('user/order-poster');
    }

    public function orderBanner()
    {
      return view('user/order-banner');
    }

    public function orderPamflet()
    {
      return view('user/order-pamflet');
    }

    public function orderIdCard()
    {
      return view('user/order-id-card');
    }

    public function orderLogo()
    {
      return view('user/order-logo');
    }

    public function orderCv()
    {
      return view('user/order-cv');
    }

    public function orderBookCover()
    {
      return view('user/order-book-cover');
    }

    public function getTheme()
    {
      return Theme::all();
    }

    public function storeSpanduk(Request $request)
    {      
      $this->validator($request->all())->validate();
      $discount = $this->checkDiscount(\Config::get('price.spanduk'), \Config::get('product.spanduk'));

      if($request->file == ""){
        $file = NULL;
      }else{
        $file = Auth::user()->email.'_'.time().'_'.$request->file('file')->getClientOriginalName();
        $request->file('file')->move(public_path().'/storage/orderan', $file);
      }

      $user = User::find(Auth::user()->id);
      $user->phone = $request->phone;
      $user->sosmed = $request->sosmed;
      $user->discount_id = 1;
      $user->save();

      $spanduk = Order::create([
        'client_id' => Auth::user()->id,
        'name' => 'Spanduk',
        'price' => $discount['price'],
        'size_long' => $request->size_long,
        'size_wide' => $request->size_wide,
        'theme' => $request->theme,
        'content' => $request->content,
        'note' => $request->note,
        'file' => $file,
        'revision' => \Config::get('revision.spanduk'),
        'created_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
        'updated_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
        'discount_status' => $discount['status'],
      ]);

      $designer = User::where('role_id', 2)->get();

      foreach($designer as $data){
        Mail::to($data->email)->send(new OrderBroadcast($spanduk));
      }

      return redirect('/home');
    }

    public function storePoster(Request $request)
    {
      $this->validator($request->all())->validate();
      $discount = $this->checkDiscount(\Config::get('price.poster'), \Config::get('product.poster'));

      if($request->file == ""){
        $file = NULL;
      }else{
        $file = Auth::user()->email.'_'.time().'_'.$request->file('file')->getClientOriginalName();
        $request->file('file')->move(public_path().'/storage/orderan', $file);
      }

      $user = User::find(Auth::user()->id);
      $user->phone = $request->phone;
      $user->sosmed = $request->sosmed;
      $user->discount_id = 1;
      $user->save();

      $poster = Order::create([
        'client_id' => Auth::user()->id,
        'name' => 'Poster',
        'price' => $discount['price'],
        'size_long' => $request->size_long,
        'size_wide' => $request->size_wide,
        'theme' => $request->theme,
        'content' => $request->content,
        'note' => $request->note,
        'file' => $file,
        'revision' => \Config::get('revision.poster'),
        'created_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
        'updated_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
        'discount_status' => $discount['status'],
      ]);

      $designer = User::where('role_id', 2)->get();

      foreach($designer as $data){
        Mail::to($data->email)->send(new OrderBroadcast($poster));
      }

      return redirect('/home');
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
          'phone' => 'required',
          'size_long' => 'required',
          'size_wide' => 'required',
          'theme' => 'required',
          'content' => 'required',
          'file' => 'mimes:jpeg,jpg,png,zip,rar|max:52400'
        ]);
    }

    public function checkDiscount($price, $product)
    {
      if(Auth::user()->discount_id != 1){
        $data = Discount::find(Auth::user()->discount_id);
        if(strpos($data->product, $product)){
          $price = $price - ($price * ($data->discount/100));
          $status = $data->name;
          return [
            'price' => $price,
            'status' => $status
          ];
        }else{
          return [
            'price' => $price,
            'status' => NULL
          ];
        }
      }else{
        return [
          'price' => $price,
          'status' => NULL
        ];
      }
    }

    public function destroyOrder($id)
    {
      $data = Order::all();
      foreach ($data as $key) {
        if(md5($key->id) == $id){
          Storage::delete('orderan/'.$key->file);
          $key->delete();
          return back();
        }
      }
    }

}
