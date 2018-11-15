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
      Selamat! Akun anda telah berhasil diverifikasi dan anda mendapatkan <a href="#" class="alert-link">diskon 10% </a> untuk semua jenis pesanan.
      Silahkan cek halaman profile akun anda.
      </div>
    </div>

  </div>



@endsection
