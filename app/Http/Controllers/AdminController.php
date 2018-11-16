<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Role;
use App\Models\Order;
use App\Models\Theme;
use App\Models\Photo;
use App\Models\Discount;
use App\Models\ThemePhoto;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Mail\ConfirmPayment;
use App\Mail\FinishTransaction;
use App\Models\HistoryTransaction;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
      $user = User::where('role_id', 3)->count();
      $designer = User::where('role_id', 2)->count();
      $debit = HistoryTransaction::with('user')->whereHas('user',function($query){
              $query->where('role_id','=', 1);
            })->sum('debit');
      $kredit = HistoryTransaction::with('user')->whereHas('user',function($query){
              $query->where('role_id','=', 1);
            })->sum('kredit');
      $adminMoney = $debit + $kredit;

      $debitAll = HistoryTransaction::with('user')->sum('debit');
      $kreditAll = HistoryTransaction::with('user')->sum('kredit');
      $moneyAll = $debitAll + $kreditAll;

      $waiting = Order::where('status','waiting')->get()->count();

      return view('admin/dashboard')->with(['user' => $user,
                                            'designer' => $designer,
                                            'adminMoney' => $adminMoney,
                                            'moneyAll' => $moneyAll,
                                            'waiting' => $waiting
                                          ]);
    }

    public function indexUser()
    {
      $users = User::with('role')->orderBy('created_at','desc')->get();
      $roles = Role::all();

      return view('admin/user-management')->with('users',$users)->with('roles',$roles);
    }

    public function indexDeletedUser()
    {
      $deletedUsers = User::onlyTrashed()->get();
      return view('admin/user-management-blocked')->with('deletedUsers', $deletedUsers);
    }

    public function deleteUser($id)
    {
      $user = User::find($id);
      $user->delete();
      return back()->with('success','You have successfully block user');
    }

    public function destroyUser($id)
    {
      $user = User::where('id',$id)->forceDelete();
      return back()->with('success','You have successfully destroy user');
    }

    public function restoreUser($id)
    {
      $restore = User::withTrashed()->where('id',$id);
      $restore->restore();
      return back()->with('success','You have successfully restore user');
    }

    public function updateUser(Request $request, $id)
    {
      $this->validatorUpdateUser($request->all())->validate();

      $user = User::find($id);
      $user->name = $request->name;
      $user->role_id = $request->role_id;
      $user->updated_at = Carbon::now()->setTimezone('Asia/Jakarta');
      $user->save();

      return back()->with('success','You have successfully update data user');
    }

    public function validatorUpdateUser(array $data)
    {
        return Validator::make($data, [
            'name'  => 'required|string|max:190',
            'role_id' => 'required'
        ]);
    }

    public function resetPasswordUser($id)
    {
      $user = User::find($id);
      $new =  rand(100000,900900);
      $user->password = bcrypt($new);
      $user->updated_at = Carbon::now()->setTimezone('Asia/Jakarta');
      $user->save();

      return back()->with('success','You have successfully reset password '.$user->username.'. New Password: '.$new);
    }

    public function registerDesigner(Request $request)
    {
      $this->validatorRegisterDesigner($request->all())->validate();

      $token = bin2hex(random_bytes(50));
      $name = preg_replace('/@.*?$/', '', $request->email);

      User::create([
          'name' => $name,
          'email' => $request->email,
          'password' => bcrypt($request->password),
          'role_id' => 2,
          'discount_id' => 1,
          'email_confirmation' => $token,
          'verified' => true,
      ]);

      return back()->with('success','You have succesfully add new designer account');
    }

    public function validatorRegisterDesigner(array $data)
    {
        return Validator::make($data, [
          'email' => 'required|string|email|max:191|unique:users',
          'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function indexDiscount()
    {
      $discount = Discount::where('id','!=',1)->orderBy('created_at','desc')->get();
      $customer = User::where('role_id',3)->where('verified',true)->get();
      return view('admin/discount-management')->with('discount', $discount)
                                              ->with('customer',$customer);
    }

    public function storeDiscount(Request $request)
    {
      $this->validatorStoreDiscount($request->all())->validate();
      Discount::create([
        'name' => $request->name,
        'discount' => $request->discount,
        'product' => serialize($request->product)
      ]);
      return back();
    }

    public function validatorStoreDiscount(array $data)
    {
        return Validator::make($data, [
            'name'  => 'required|string|max:190',
            'discount' => 'required',
            'product' => 'required',
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
            'updated_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
        ]);
    }

    public function sendDiscount(Request $request)
    {
      $user = User::find($request->user);
      $user->discount_id = $request->discount_id;
      $user->save();
      return back()->with('success','You have successfully add a discount to '.$user->name);
    }

    public function destroyDiscount($id)
    {
      $user = User::where('discount_id','=',$id)->get();
      foreach($user as $x){
        $x->discount_id = 1;
        $x->save();
      }

      $discount = Discount::find($id);
      $discount->delete();

      return back()->with('success','You have successfully destroy a discount!');
    }

    public function userDiscount()
    {
      $user = User::with('discount')->where('role_id',3)->orderBy('created_at','desc')->get();
      return view('admin/discount-management-user')->with('user',$user);
    }

    public function waitingOrder()
    {
      $order = Order::with('user')->where('status','waiting')->get();
      return view('admin/transaction-waiting')->with('order',$order);
    }

    public function onProgressOrder()
    {
      $transaction = Transaction::with('user','order','order.user')->get();
      return view('admin/transaction-on-progress')->with('transaction',$transaction);
    }

    public function confirmPayment($transaction_id, $order_id)
    {
      $transaction = Transaction::with('order')->find($transaction_id);
      $transaction->payment_status = "paid";
      $transaction->save();

      $order = Order::with('user')->find($order_id);

      Mail::to($order->user->email)->send(new ConfirmPayment($order->user->name, $transaction));

      return back();
    }

    public function indexTheme()
    {
      $theme = Theme::orderBy('created_at','desc')->get();
      return view('admin.theme')->with('theme',$theme);
    }

    public function storeTheme(Request $request)
    {
      Theme::create([
        'name' => $request->name,
        'description' => $request->description
      ]);
      return back()->with('success', 'You have successfully add new theme!');
    }

    public function destroyTheme($id)
    {
      $x = Theme::find($id);
      $x->delete();
      return back()->with('success', 'You have succesfully destroy a theme!');
    }

    public function indexThemePhoto()
    {
      $themePhoto = Photo::paginate(8);
      $theme = Theme::all();
      return view('admin/theme-photo')->with('themePhoto', $themePhoto)->with('theme',$theme);
    }

    public function storeThemePhoto(Request $request)
    {
      $file = time().'_'.$request->file('photo')->getClientOriginalName();
      $request->file('photo')->move(public_path().'/storage/theme', $file);

      $photo = Photo::create([
        'name' => $request->name,
        'path' => $file,
        'created_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
        'updated_at' => Carbon::now()->setTimezone('Asia/Jakarta')
      ]);

      foreach ($request->theme as $key) {
        ThemePhoto::create([
          'photo_id' => $photo->id,
          'theme_id' => $key,
          'created_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
          'updated_at' => Carbon::now()->setTimezone('Asia/Jakarta')
        ]);
      }

      return back()->with('success','You have succesfully add new photo - theme');
    }

    public function destroyPhoto($id)
    {
      $photo = Photo::find($id);
      Storage::delete('theme/'.$photo->path);
      $photo->delete();

      return back()->with('success','You have successfully destroy this photo!');
    }

    public function destroyThemePhoto($id)
    {
      $themePhoto = ThemePhoto::find($id);
      $themePhoto->delete();

      return back()->with('success','You have successfully destroy this theme!');
    }

    public function confirmSudah($id)
    {
      $transaction = Transaction::find($id);
      $transaction->status = "sudah diupload";
      $transaction->save();
      return back();
    }

    public function confirmBelum($id)
    {
      $transaction = Transaction::find($id);
      $transaction->status = "belum diupload";
      $transaction->save();
      return back();
    }

    public function confirmRevision($id)
    {
      $order = Order::with('user')->find($id);
      $order->status = "revision";
      $order->save();
      return back();
    }

    public function confirmDone($id)
    {
      $order = Order::with('user')->find($id);
      $order->status = "done";
      $order->save();

      $designerMoney = $order->price * (0.85);
      $adminMoney = $order->price * (0.15);

      HistoryTransaction::create([
        'user_id' => $order->user->id,
        'debit' => $designerMoney,
        'keterangan' => "Bayaran dari orderan #".$order->id,
        'created_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
        'updated_at' => Carbon::now()->setTimezone('Asia/Jakarta')
      ]);

      HistoryTransaction::create([
        'user_id' => Auth::user()->id,
        'debit' => $adminMoney,
        'keterangan' => "Bayaran dari orderan #".$order->id,
        'created_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
        'updated_at' => Carbon::now()->setTimezone('Asia/Jakarta')
      ]);

      Mail::to($order->user->email)->send(new FinishTransaction($order->user->name));

      return back()->with('success','Transaction is complete, email confirmation has been sent to client');
    }

    public function redirectToFiles()
    {
      return redirect()->away('https://drive.google.com/drive/folders/0By5QTXJ5xFt3fkJiN2daUDczZ1lfQ2VnVWtxZXVqbDJnSzNkOGR2Q2VUYS1CRGFLbS1QQTA?usp=sharing');
    }

}
