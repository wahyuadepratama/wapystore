@extends('layouts.app-guest')

@section('head')

@endsection

@section('content')

  <div id="page-content" class="page-wrapper">

      <!-- ERROR SECTION START -->
      <div class="error-section mb-80">
          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <div class="error-404 box-shadow">
                          <img src="{{ asset('guest/images/404/404.png') }}" class="img-responsive" >
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
