@extends('layouts.app-guest')

@section('head')

@endsection

@section('content')

  @include('guest.includes.header')

  <!-- BREADCRUMBS SETCTION START -->
  <div class="breadcrumbs-section plr-200 mb-80" style="padding-top: 8%">
      <div class="breadcrumbs overlay-bg">
          <div class="container">
              <div class="row">

              </div>
          </div>
      </div>
  </div>
  <!-- BREADCRUMBS SETCTION END -->

  <div id="page-content" class="page-wrapper">

    @if ($errors->has('email'))
      <div class="alert alert-danger" role="alert" style="margin-left:7%;margin-right:7%">
      <center><a href="#" class="alert-link">{{ $errors->first('email') }}</a></center>
      </div><br>
    @endif
      <!-- LOGIN SECTION START -->
      <div class="login-section mb-80">
          <div class="container">
            @if($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
              {{ $message }}
            </div>
            @endif
              <div class="row">
                  <div class="col-md-6">
                      <div class="new-customers">
                          <form class="form-horizontal" method="POST" action="/home/change-password/store">
                            {{ csrf_field() }}
                              <h6 class="widget-title border-left mb-50">Ubah Password</h6>
                              <div class="login-account p-30 box-shadow">
                                  <input type="password"  placeholder="New Password" name="password" required style="color: black;">
                                  <input type="password"  placeholder="Confirm New Password" name="password_confirmation" required style="color: black;">
                                  @if ($errors->has('password'))
                                      <span class="help-block alert alert-danger">
                                          <small><strong>{{ $errors->first('password') }}</strong></small>
                                      </span>
                                  @endif
                                  <div class="row">
                                      <div class="col-md-6">
                                          <button class="form-control submit-btn-1 mt-20 btn-hover-1" type="submit">Change Password</button>
                                      </div>
                                      <div class="col-md-6">
                                          <button class="form-control submit-btn-1 mt-20 btn-hover-1 f-right" type="reset">Clear</button>
                                      </div>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- LOGIN SECTION END -->

  </div>

  @include('guest.includes.footer')

@endsection
