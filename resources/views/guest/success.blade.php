@extends('layouts.app-guest')

@section('head')

@endsection

@section('content')

  @include('guest.includes.header')

<div id="page-content" class="page-wrapper" style="margin-top: 5%">

  <div class="container">
    <div class="row" style="text-align:center;">
      <center><img src="{{ asset('/guest/images/icons/success.png') }}" style="margin-top: 5%" class="img-responsive"></center>
      <div class="alert alert-success" role="alert" style="margin: 2%">
      <h4>Terima kasih sudah melakukan pemesanan. Silahkan segera lakukan pembayaran.</h4>
      <h4>Untuk pertanyaan bisa langsung ditanyakan via <b><a target="_blank" rel="noopener noreferrer" href="https://wa.me/6289676253311?text=Saya%20ingin%20bertanya%20terkait%20pemesanan%20desain.">WhatsApp (Klik Link Ini)</a></b></h4>
      </div>
    </div>
  </div>

</div>




@endsection
