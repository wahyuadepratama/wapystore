<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Term;
use App\Models\User;
use App\Models\Role;
use App\Models\Discount;
use App\Models\OrderType;
use Illuminate\Http\Request;
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
      return view('admin/dashboard');
    }

    public function indexUser()
    {
      $users = User::with('role')->get();
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

    public function indexDiscount()
    {
      $discount = Discount::all();
      $customer = User::where('role_id',3)->where('verified',true)->get();
      return view('admin/discount-management')->with('discount', $discount)
                                              ->with('customer',$customer);
    }

    public function storeDiscount(Request $request)
    {
      $this->validatorStoreDiscount($request->all())->validate();
      Discount::create([
        'name' => $request->name,
        'discount' => $request->discount
      ]);
      return back();
    }

    public function validatorStoreDiscount(array $data)
    {
        return Validator::make($data, [
            'name'  => 'required|string|max:190',
            'discount' => 'required'
        ]);
    }

}
