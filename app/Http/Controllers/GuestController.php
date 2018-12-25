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
      //return redirect('/shop');
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

    public function searchFilter(Request $request)
    {
            if($request->brand == "Semua" && $request->price == "Semua" && $request->category == "Semua"){

                    return redirect('/shop');

            }elseif($request->brand == "Semua" && $request->price == "Semua"){

                      $stock = Stock::where('id_category', $request->category)->paginate(12);
                      $hasil = CategoryStock::where('id',$request->category)->first();
                      return view('shop/index')->with('stock', $stock)
                                              ->with('category', $request->category)
                                              ->with('price', $request->price)
                                              ->with('brand', $request->brand)
                                              ->with('message', 'Hasil pencarian untuk kategori '.$hasil->name);

            }elseif($request->brand == "Semua" && $request->category == "Semua"){

                      if($request->price == 1){
                        $stock = Stock::where('price', '<=', 100000)->paginate(12);
                        return view('shop/index')->with('stock', $stock)->with('price', $request->price)
                                                ->with('category', $request->category)->with('brand', $request->brand)
                                                ->with('message', 'Hasil pencarian untuk harga dibawah Rp100.000');
                      }
                      if($request->price == 2){
                        $stock = Stock::where('price', '>=', 100000)->where('price', '<=', 150000)->paginate(12);
                        return view('shop/index')->with('stock', $stock)->with('price', $request->price)
                                                ->with('category', $request->category)->with('brand', $request->brand)
                                                ->with('message', 'Hasil pencarian untuk harga Rp100.000 - Rp150.000');
                      }
                      if($request->price == 3){
                        $stock = Stock::where('price', '>=', 150000)->where('price', '<=', 200000)->paginate(12);
                        return view('shop/index')->with('stock', $stock)->with('price', $request->price)
                                                ->with('category', $request->category)->with('brand', $request->brand)
                                                ->with('message', 'Hasil pencarian untuk harga Rp150.000 - Rp200.000');
                      }
                      if($request->price == 4){
                        $stock = Stock::where('price', '>=', 200000)->where('price', '<=', 250000)->paginate(12);
                        return view('shop/index')->with('stock', $stock)->with('price', $request->price)
                                                ->with('category', $request->category)->with('brand', $request->brand)
                                                ->with('message', 'Hasil pencarian untuk harga Rp200.000 - Rp250.000');
                      }
                      if($request->price == 5){
                        $stock = Stock::where('price', '>=', 250000)->paginate(12);
                        return view('shop/index')->with('stock', $stock)->with('price', $request->price)
                                                ->with('category', $request->category)->with('brand', $request->brand)
                                                ->with('message', 'Hasil pencarian untuk harga diatas Rp250.000');
                      }

            }elseif($request->price == "Semua" && $request->category == "Semua"){

                    $stock = Stock::where('brand', $request->brand)->paginate(12);
                    return view('shop/index')->with('stock', $stock)
                                            ->with('category', $request->category)
                                            ->with('price', $request->price)
                                            ->with('brand', $request->brand)
                                            ->with('message', 'Hasil pencarian brand '.$request->brand);

            }elseif($request->brand == "Semua"){

                    $hasil = CategoryStock::where('id',$request->category)->first();

                    if($request->price == 1){
                      $stock = Stock::where('price', '<=', 100000)->where('id_category',$request->category)->paginate(12);
                      return view('shop/index')->with('stock', $stock)->with('price', $request->price)
                                              ->with('category', $request->category)->with('brand', $request->brand)
                                              ->with('message', 'Hasil pencarian kategori '. $hasil->name .' dengan harga dibawah Rp100.000');
                    }
                    if($request->price == 2){
                      $stock = Stock::where('price', '>=', 100000)->where('price', '<=', 150000)->where('id_category',$request->category)->paginate(12);
                      return view('shop/index')->with('stock', $stock)->with('price', $request->price)
                                              ->with('category', $request->category)->with('brand', $request->brand)
                                              ->with('message', 'Hasil pencarian kategori '.$hasil->name.' dengan harga Rp100.000 - Rp150.000');
                    }
                    if($request->price == 3){
                      $stock = Stock::where('price', '>=', 150000)->where('price', '<=', 200000)->where('id_category',$request->category)->paginate(12);
                      return view('shop/index')->with('stock', $stock)->with('price', $request->price)
                                              ->with('category', $request->category)->with('brand', $request->brand)
                                              ->with('message', 'Hasil pencarian kategori '.$hasil->name.' dengan harga Rp150.000 - Rp200.000');
                    }
                    if($request->price == 4){
                      $stock = Stock::where('price', '>=', 200000)->where('price', '<=', 250000)->where('id_category',$request->category)->paginate(12);
                      return view('shop/index')->with('stock', $stock)->with('price', $request->price)
                                              ->with('category', $request->category)->with('brand', $request->brand)
                                              ->with('message', 'Hasil pencarian kategori '.$hasil->name.' dengan harga Rp200.000 - Rp250.000');
                    }
                    if($request->price == 5){
                      $stock = Stock::where('price', '>=', 250000)->where('id_category',$request->category)->paginate(12);
                      return view('shop/index')->with('stock', $stock)->with('price', $request->price)
                                              ->with('category', $request->category)->with('brand', $request->brand)
                                              ->with('message', 'Hasil pencarian kategori '.$hasil->name.' dengan harga diatas Rp250.000');
                    }

            }elseif($request->price == "Semua"){

                    $stock = Stock::where('brand', $request->brand)->where('id_category', $request->category)->paginate(12);
                    $hasil = CategoryStock::where('id',$request->category)->first();
                    return view('shop/index')->with('stock', $stock)
                                            ->with('category', $request->category)
                                            ->with('price', $request->price)
                                            ->with('brand', $request->brand)
                                            ->with('message', 'Hasil pencarian brand '.$request->brand.' dengan kategori '.$hasil->name);

            }elseif($request->category == "Semua"){

                    if($request->price == 1){
                      $stock = Stock::where('price', '<=', 100000)->where('brand',$request->brand)->paginate(12);
                      return view('shop/index')->with('stock', $stock)->with('price', $request->price)
                                              ->with('category', $request->category)->with('brand', $request->brand)
                                              ->with('message', 'Hasil pencarian brand '. $request->brand .' dengan harga dibawah Rp100.000');
                    }
                    if($request->price == 2){
                      $stock = Stock::where('price', '>=', 100000)->where('price', '<=', 150000)->where('brand',$request->brand)->paginate(12);
                      return view('shop/index')->with('stock', $stock)->with('price', $request->price)
                                              ->with('category', $request->category)->with('brand', $request->brand)
                                              ->with('message', 'Hasil pencarian brand '.$request->brand.' dengan harga Rp100.000 - Rp150.000');
                    }
                    if($request->price == 3){
                      $stock = Stock::where('price', '>=', 150000)->where('price', '<=', 200000)->where('brand',$request->brand)->paginate(12);
                      return view('shop/index')->with('stock', $stock)->with('price', $request->price)
                                              ->with('category', $request->category)->with('brand', $request->brand)
                                              ->with('message', 'Hasil pencarian brand '.$request->brand.' dengan harga Rp150.000 - Rp200.000');
                    }
                    if($request->price == 4){
                      $stock = Stock::where('price', '>=', 200000)->where('price', '<=', 250000)->where('brand',$request->brand)->paginate(12);
                      return view('shop/index')->with('stock', $stock)->with('price', $request->price)
                                              ->with('category', $request->category)->with('brand', $request->brand)
                                              ->with('message', 'Hasil pencarian brand '.$request->brand.' dengan harga Rp200.000 - Rp250.000');
                    }
                    if($request->price == 5){
                      $stock = Stock::where('price', '>=', 250000)->where('brand',$request->brand)->paginate(12);
                      return view('shop/index')->with('stock', $stock)->with('price', $request->price)
                                              ->with('category', $request->category)->with('brand', $request->brand)
                                              ->with('message', 'Hasil pencarian brand '.$request->brand.' dengan harga diatas Rp250.000');
                    }

            }else{

                    $hasil = CategoryStock::where('id',$request->category)->first();

                    if($request->price == 1){
                      $stock = Stock::where('price', '<=', 100000)->where('brand',$request->brand)->where('id_category',$request->category)->paginate(12);
                      return view('shop/index')->with('stock', $stock)->with('price', $request->price)
                                              ->with('category', $request->category)->with('brand', $request->brand)
                                              ->with('message', 'Hasil pencarian brand '. $request->brand .' dan kategori '.$hasil->name.' dengan harga dibawah Rp100.000');
                    }
                    if($request->price == 2){
                      $stock = Stock::where('price', '>=', 100000)->where('price', '<=', 150000)->where('brand',$request->brand)->where('id_category',$request->category)->paginate(12);
                      return view('shop/index')->with('stock', $stock)->with('price', $request->price)
                                              ->with('category', $request->category)->with('brand', $request->brand)
                                              ->with('message', 'Hasil pencarian brand '.$request->brand.' dan kategori '.$hasil->name.' dengan harga Rp100.000 - Rp150.000');
                    }
                    if($request->price == 3){
                      $stock = Stock::where('price', '>=', 150000)->where('price', '<=', 200000)->where('brand',$request->brand)->where('id_category',$request->category)->paginate(12);
                      return view('shop/index')->with('stock', $stock)->with('price', $request->price)
                                              ->with('category', $request->category)->with('brand', $request->brand)
                                              ->with('message', 'Hasil pencarian brand '.$request->brand.' dan kategori '.$hasil->name.' dengan harga Rp150.000 - Rp200.000');
                    }
                    if($request->price == 4){
                      $stock = Stock::where('price', '>=', 200000)->where('price', '<=', 250000)->where('brand',$request->brand)->where('id_category',$request->category)->paginate(12);
                      return view('shop/index')->with('stock', $stock)->with('price', $request->price)
                                              ->with('category', $request->category)->with('brand', $request->brand)
                                              ->with('message', 'Hasil pencarian brand '.$request->brand.' dan kategori '.$hasil->name.' dengan harga Rp200.000 - Rp250.000');
                    }
                    if($request->price == 5){
                      $stock = Stock::where('price', '>=', 250000)->where('brand',$request->brand)->where('id_category',$request->category)->paginate(12);
                      return view('shop/index')->with('stock', $stock)->with('price', $request->price)
                                              ->with('category', $request->category)->with('brand', $request->brand)
                                              ->with('message', 'Hasil pencarian brand '.$request->brand.' dan kategori '.$hasil->name.' dengan harga diatas Rp250.000');
                    }

            }
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
