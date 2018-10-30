<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
    $this->middleware('user');
  }

  public function orderSpanduk()
  {
    return view('user/order-spanduk');
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

}
