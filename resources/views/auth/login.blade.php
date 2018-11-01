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
                  <div class="col-xs-12">
                      <div class="breadcrumbs-inner">
                          <h1 class="breadcrumbs-title">Login / Register</h1>
                          <ul class="breadcrumb-list">
                              <li><a href="index.html">Home</a></li>
                              <li>Login / Register</li>
                          </ul>
                      </div>
                  </div>
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
              <div class="row">
                  <div class="col-md-6">
                      <div class="registered-customers">
                          <h6 class="widget-title border-left mb-50">REGISTERED CUSTOMERS</h6>
                            <div class="login-account p-30 box-shadow">
                                <p>If you have an account, Please log in.</p>
                                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                  {{ csrf_field() }}
                                  <input type="text" name="identity" value="{{ old('email') }}" required autofocus placeholder="E-Mail or Username">
                                  <input type="password" name="password" placeholder="Password" required>
                                  @if ($errors->has('name'))
                                      <span class="help-block alert alert-danger">
                                          <small><strong>{{ $errors->first('name') }}</strong></small>
                                      </span>
                                  @endif
                                  <p><small><a href="{{ route('password.request') }}">Forgot our password?</a></small></p>
                                  <button class="form-control submit-btn-1 btn-hover-1" type="submit">login</button>
                                </form>
                            </div>
                      </div>
                  </div>
                  <!-- new-customers -->
                  <div class="col-md-6">
                      <div class="new-customers">
                          <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                              <h6 class="widget-title border-left mb-50">NEW CUSTOMERS</h6>
                              <div class="login-account p-30 box-shadow">
                                  <div class="row">
                                      <div class="col-sm-12">
                                          <input type="text" placeholder="E-Mail" name="email" value="{{ old('email') }}" required>
                                      </div>
                                  </div>
                                  <input type="password"  placeholder="Password" name="password" required>
                                  <input type="password"  placeholder="Confirm Password" name="password_confirmation" required>
                                  @if ($errors->has('password'))
                                      <span class="help-block alert alert-danger">
                                          <small><strong>{{ $errors->first('password') }}</strong></small>
                                      </span>
                                  @endif
                                  <div class="row">
                                      <div class="col-md-6">
                                          <button class="form-control submit-btn-1 mt-20 btn-hover-1" type="submit" value="register">Register</button>
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
