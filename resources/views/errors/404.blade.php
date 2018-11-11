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
                          <h1 class="breadcrumbs-title">404 Not Found</h1>
                          <ul class="breadcrumb-list">
                              <li><a href="/">Home</a></li>
                              <li>404</li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- BREADCRUMBS SETCTION END -->

  <div id="page-content" class="page-wrapper">

      <!-- ERROR SECTION START -->
      <div class="error-section mb-80">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <div class="error-404 box-shadow">
                          <img src="{{ asset('guest/images/404/404.png') }}" alt="">
                          <div class="go-to-btn btn-hover-2">
                              <a href="/">go to home page</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- ERROR SECTION END -->
  </div>

  @include('guest.includes.footer')

@endsection
