@extends('layouts.app-guest')

@section('head')

@endsection

@section('content')

  @include('guest.includes.header')

  <!-- BREADCRUMBS SETCTION START -->
  <div class="breadcrumbs-section plr-200 mb-80" style="padding-top: 8%">

  </div>
  <!-- BREADCRUMBS SETCTION END -->

  <div id="page-content" class="page-wrapper">

    <div class="col-md-12" style="text-align: center; padding-right: 10%; padding-left: 10%">
      <div class="alert alert-success" role="alert">
      Congratulation! Your account has been verified and you get <a href="#" class="alert-link">10% discount </a>to all of design orders. Please check your account now.
      </div>
    </div>

  </div>



@endsection
