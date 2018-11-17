<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Mailist;
use App\Mail\RegisterConfirmation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        $url = url('/');
        if(strpos($url, 'root') !== false){

          $token = bin2hex(random_bytes(50));
          $name = preg_replace('/@.*?$/', '', $data['email']);

          return User::create([
              'name' => $name,
              'email' => $data['email'],
              'password' => bcrypt($data['password']),
              'role_id' => 2,
              'discount_id' => 1,
              'email_confirmation' => $token,
              'verified' => true,
          ]);

        }else{

          $token = bin2hex(random_bytes(50));
          $name = preg_replace('/@.*?$/', '', $data['email']);

          Mail::to($data['email'])->send(new RegisterConfirmation($token, $name));

          Mailist::firstOrNew([
            'email' => $data['email'],
            'last_promote' => NULL,
            'created_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
            'updated_at' => Carbon::now()->setTimezone('Asia/Jakarta'),
          ]);

          return User::create([
              'name' => $name,
              'email' => $data['email'],
              'password' => bcrypt($data['password']),
              'role_id' => 3,
              'discount_id' => 1,
              'email_confirmation' => $token,
          ]);
        }

    }

}
