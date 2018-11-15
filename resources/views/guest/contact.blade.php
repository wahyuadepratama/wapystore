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
                          <h1 class="breadcrumbs-title">Contact</h1>
                          <ul class="breadcrumb-list">
                              <li><a href="/">Home</a></li>
                              <li>Contact</li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- BREADCRUMBS SETCTION END -->

  <section id="page-content" class="page-wrapper">

      <!-- ADDRESS SECTION START -->
      <div class="address-section mb-80">
          <div class="container">
              <div class="row">
                  @if($message = Session::get('success'))
                  <div class="alert alert-success" role="alert">
                    {{ $message }}
                  </div>
                  @endif
                  <div class="col-sm-3 col-xs-12">
                      <div class="contact-address box-shadow">
                          <i class="zmdi zmdi-instagram"></i>
                          <h6>IG: @wapydesign</h6>
                      </div>
                  </div>
                  <div class="col-sm-3 col-xs-12">
                      <div class="contact-address box-shadow">
                          <i class="zmdi zmdi-phone"></i>
                          <h6>LINE: @paa0093h</h6>
                      </div>
                  </div>
                  <div class="col-sm-3 col-xs-12">
                      <div class="contact-address box-shadow">
                          <i class="zmdi zmdi-whatsapp"></i>
                          <h6>(+628) 96-7625-3311</h6>
                          <h6>(+628) 13-7132-1971</h6>
                      </div>
                  </div>
                  <div class="col-sm-3 col-xs-12">
                      <div class="contact-address box-shadow">
                          <i class="zmdi zmdi-email"></i>
                          <h6>official@wapydesign.com</h6>
                          <h6>wapydesign@gmail.com</h6>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- ADDRESS SECTION END -->

      <!-- MESSAGE BOX SECTION START -->
      <div class="message-box-section mt--50 mb-80">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <div class="message-box box-shadow white-bg">
                          <form id="contact-form" action="/advice" method="post">
                            {{ csrf_field() }}
                              <div class="row">
                                  <div class="col-md-12">
                                      <h4 class="blog-section-title border-left mb-30">Kritik dan Saran</h4>
                                  </div>
                                  <div class="col-md-6">
                                      <input type="text" name="email" placeholder="Your email here (Optional)">
                                  </div>
                                  <div class="col-md-6">
                                      <input type="text" name="name" placeholder="Your name here (Optional)">
                                  </div>
                                  <div class="col-md-12">
                                      <textarea class="custom-textarea" name="message" placeholder="Message"></textarea>
                                      @if ($errors->has('message'))
                                          <span class="help-block alert alert-danger">
                                              <small><strong>{{ $errors->first('message') }}</strong></small>
                                          </span>
                                      @endif
                                      <button class="submit-btn-1 mt-30 btn-hover-1" type="submit">send message</button>
                                  </div>
                              </div>
                          </form>
                          <p class="form-messege"></p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- MESSAGE BOX SECTION END -->
  </section>

  @include('guest.includes.footer')

@endsection
