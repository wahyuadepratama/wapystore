<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\CategoryStock;
use App\Mail\WapyShopOrder;
use Illuminate\Http\Request;
use App\Models\ShopOrder;
use App\Models\Visitor;
use App\Models\Advice;
use App\Models\Photo;
use App\Models\User;
use App\Models\Stock;
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

      // $portofolio = Photo::all()->random(9);
      return view('guest/index');
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

    public function indexShop()
    {
      $stock = Stock::orderBy('created_at','desc')->paginate(12);
      return view('shop/index')->with('stock', $stock);
    }

    public function showShop($id)
    {
      $stock = Stock::where('id', $id)->first();
      return view('shop/detail')->with('stock', $stock);
    }

    public function categoryShop($category)
    {
      $category = CategoryStock::where('name', $category)->first();
      $stock = Stock::where('id_category', $category->id)->paginate(12);
      return view('shop/index')->with('stock', $stock);
    }

    public function searchShop(Request $request)
    {
      $stock = Stock::where('name', 'LIKE', '%'.$request->search.'%')->paginate(12);
      return view('shop/index')->with('stock', $stock)->with('search', $request->search);
    }

    public function searchBrandShop(Request $request)
    {
      $stock = Stock::where('brand', 'LIKE', '%'.$request->brand.'%')->paginate(12);
      return view('shop/index')->with('stock', $stock)->with('brand', $request->brand);
    }

    public function searchHargaShop(Request $request)
    {
      if($request->harga == 1){
        $stock = Stock::where('price', '<=', 100000)->paginate(12);
        return view('shop/index')->with('stock', $stock)->with('price', $request->harga);
      }

      if($request->harga == 2){
        $stock = Stock::where('price', '>=', 100000)->where('price', '<=', 150000)->paginate(12);
        return view('shop/index')->with('stock', $stock)->with('price', $request->harga);
      }

      if($request->harga == 3){
        $stock = Stock::where('price', '>=', 150000)->where('price', '<=', 200000)->paginate(12);
        return view('shop/index')->with('stock', $stock)->with('price', $request->harga);
      }

      if($request->harga == 4){
        $stock = Stock::where('price', '>=', 200000)->where('price', '<=', 250000)->paginate(12);
        return view('shop/index')->with('stock', $stock)->with('price', $request->harga);
      }

      if($request->harga == 5){
        $stock = Stock::where('price', '>=', 250000)->paginate(12);
        return view('shop/index')->with('stock', $stock)->with('price', $request->harga);
      }
    }

    public function searchCategoryShop(Request $request)
    {
      $stock = Stock::where('id_category', $request->category)->paginate(12);
      return view('shop/index')->with('stock', $stock)->with('category', $request->category);
    }

    public function storeShop($id, Request $request)
    {
      $validator = Validator::make($request->all(), [
          'email' => 'required',
          'name' => 'required',
          'size' => 'required',
          'city' => 'required',
          'address' => 'required',
          'phone' => 'required'
      ]);

      $data = Stock::find($id)->first();
      Mail::to($request->email)->send(new WapyShopOrder($request->name, $data->price, $data->name));

      ShopOrder::create([
        'stock_id' => $id,
        'email' => $request->email,
        'name' => $request->name,
        'size' => $request->size,
        'city' => $request->city,
        'address' => $request->address,
        'phone' => $request->phone,
        'postal' => $request->postal,
        'note' => $request->note,
        'created_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
        'updated_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
      ]);

      return redirect('/shop'.'/'.$id.'/payment');
    }

    public function paymentShop($id)
    {
      $shop = Stock::find($id)->first();
      return view('shop/payment')->with('price', $shop->price);
    }

}
