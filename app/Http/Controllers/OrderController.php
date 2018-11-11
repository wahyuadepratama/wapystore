<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderBroadcast;
use Illuminate\Http\Request;
use App\Models\ThemePhoto;
use App\Models\PhotoTheme;
use App\Mail\PaymentOrder;
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
      return view('user/order-poster')->with('theme', $this->getTheme());
    }

    public function orderBanner()
    {
      return view('user/order-banner')->with('theme', $this->getTheme());
    }

    public function orderPamflet()
    {
      return view('user/order-pamflet')->with('theme', $this->getTheme());
    }

    public function orderIdCard()
    {
      return view('user/order-id-card')->with('theme', $this->getTheme());
    }

    public function orderLogo()
    {
      return view('user/order-logo')->with('theme', $this->getTheme());
    }

    public function orderCv()
    {
      return view('user/order-cv')->with('theme', $this->getTheme());
    }

    public function orderBookCover()
    {
      return view('user/order-book-cover')->with('theme', $this->getTheme());
    }

    public function getTheme()
    {
      return ThemePhoto::with('theme')->get();
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

      $this->sendPaymentOrderEmail($spanduk);

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

      $this->sendPaymentOrderEmail($poster);

      foreach($designer as $data){
        Mail::to($data->email)->send(new OrderBroadcast($poster));
      }

      return redirect('/home');
    }

    public function storeBanner(Request $request)
    {
      $this->validator($request->all())->validate();
      $discount = $this->checkDiscount(\Config::get('price.banner'), \Config::get('product.banner'));

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

      $banner = Order::create([
        'client_id' => Auth::user()->id,
        'name' => 'Banner',
        'price' => $discount['price'],
        'size_long' => $request->size_long,
        'size_wide' => $request->size_wide,
        'theme' => $request->theme,
        'content' => $request->content,
        'note' => $request->note,
        'file' => $file,
        'revision' => \Config::get('revision.banner'),
        'created_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
        'updated_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
        'discount_status' => $discount['status'],
      ]);

      $designer = User::where('role_id', 2)->get();

      $this->sendPaymentOrderEmail($banner);

      foreach($designer as $data){
        Mail::to($data->email)->send(new OrderBroadcast($banner));
      }

      return redirect('/home');
    }

    public function storePamflet(Request $request)
    {
      $this->validator($request->all())->validate();
      $discount = $this->checkDiscount(\Config::get('price.pamflet'), \Config::get('product.pamflet'));

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

      $pamflet = Order::create([
        'client_id' => Auth::user()->id,
        'name' => 'Pamflet',
        'price' => $discount['price'],
        'size_long' => $request->size_long,
        'size_wide' => $request->size_wide,
        'theme' => $request->theme,
        'content' => $request->content,
        'note' => $request->note,
        'file' => $file,
        'revision' => \Config::get('revision.pamflet'),
        'created_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
        'updated_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
        'discount_status' => $discount['status'],
      ]);

      $designer = User::where('role_id', 2)->get();

      $this->sendPaymentOrderEmail($pamflet);

      foreach($designer as $data){
        Mail::to($data->email)->send(new OrderBroadcast($pamflet));
      }

      return redirect('/home');
    }

    public function storeIdCard(Request $request)
    {
      $this->validator($request->all())->validate();
      $discount = $this->checkDiscount(\Config::get('price.id-card'), \Config::get('product.id-card'));

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

      $idCard = Order::create([
        'client_id' => Auth::user()->id,
        'name' => 'ID Card',
        'price' => $discount['price'],
        'size_long' => $request->size_long,
        'size_wide' => $request->size_wide,
        'theme' => $request->theme,
        'content' => $request->content,
        'note' => $request->note,
        'file' => $file,
        'revision' => \Config::get('revision.id-card'),
        'created_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
        'updated_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
        'discount_status' => $discount['status'],
      ]);

      $designer = User::where('role_id', 2)->get();

      $this->sendPaymentOrderEmail($idCard);

      foreach($designer as $data){
        Mail::to($data->email)->send(new OrderBroadcast($idCard));
      }

      return redirect('/home');
    }

    public function storeBookCover(Request $request)
    {
      $this->validator($request->all())->validate();
      $discount = $this->checkDiscount(\Config::get('price.book-cover'), \Config::get('product.book-cover'));

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

      $bookCover = Order::create([
        'client_id' => Auth::user()->id,
        'name' => 'Book Cover',
        'price' => $discount['price'],
        'size_long' => $request->size_long,
        'size_wide' => $request->size_wide,
        'theme' => $request->theme,
        'content' => $request->content,
        'note' => $request->note,
        'file' => $file,
        'revision' => \Config::get('revision.book-cover'),
        'created_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
        'updated_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
        'discount_status' => $discount['status'],
      ]);

      $designer = User::where('role_id', 2)->get();

      $this->sendPaymentOrderEmail($bookCover);

      foreach($designer as $data){
        Mail::to($data->email)->send(new OrderBroadcast($bookCover));
      }

      return redirect('/home');
    }

    public function storeCv(Request $request)
    {
      $this->validatorCv($request->all())->validate();
      $discount = $this->checkDiscount(\Config::get('price.cv'), \Config::get('product.cv'));

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

      $cv = Order::create([
        'client_id' => Auth::user()->id,
        'name' => 'CV',
        'price' => $discount['price'],
        'theme' => $request->theme,
        'content' => $request->content,
        'note' => $request->note,
        'file' => $file,
        'revision' => \Config::get('revision.cv'),
        'created_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
        'updated_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
        'discount_status' => $discount['status'],
      ]);

      $designer = User::where('role_id', 2)->get();

      $this->sendPaymentOrderEmail($cv);

      foreach($designer as $data){
        Mail::to($data->email)->send(new OrderBroadcast($cv));
      }

      return redirect('/home');
    }

    public function storeLogo(Request $request)
    {
      $this->validatorLogo($request->all())->validate();
      $discount = $this->checkDiscount(\Config::get('price.logo'), \Config::get('product.logo'));

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

      $logo = Order::create([
        'client_id' => Auth::user()->id,
        'name' => 'Logo',
        'price' => $discount['price'],
        'content' => $request->content,
        'note' => $request->note,
        'file' => $file,
        'revision' => \Config::get('revision.logo'),
        'created_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
        'updated_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
        'discount_status' => $discount['status'],
      ]);

      $designer = User::where('role_id', 2)->get();

      $this->sendPaymentOrderEmail($logo);

      foreach($designer as $data){
        Mail::to($data->email)->send(new OrderBroadcast($logo));
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

    public function validatorCv(array $data)
    {
        return Validator::make($data, [
          'phone' => 'required',
          'theme' => 'required',
          'content' => 'required',
          'file' => 'mimes:doc,pdf,docx,zip|max:52400'
        ]);
    }

    public function validatorLogo(array $data)
    {
        return Validator::make($data, [
          'phone' => 'required',
          'content' => 'required',
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

    public function sendPaymentOrderEmail($order)
    {
      Mail::to(Auth::user()->email)->send(new PaymentOrder(Auth::user()->name, $order->name, $order->price));
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
