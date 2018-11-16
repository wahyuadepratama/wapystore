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
                        <h1 class="breadcrumbs-title">Vector Art</h1>
                        <ul class="breadcrumb-list">
                            <li><a href="/">Home</a></li>
                            <li>Vector Art</li>
                        </ul>
                    </div>
                </div>
              </div>
          </div>
      </div>
  </div>
  <!-- BREADCRUMBS SETCTION END -->

  <section id="page-content" class="page-wrapper">

    <div class="shop-section mb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <ul class="cart-tab">
                        <li>
                            <a class="active" href="#isi-form" data-toggle="tab">
                                <span>01</span>
                                Isi Form Pesanan Desain
                            </a>
                        </li>
                        <li>
                            <a  href="#" data-toggle="tab">
                                <span>02</span>
                                Tunggu Desain Dibuat
                            </a>
                        </li>
                        <li>
                            <a href="#pembayaran" data-toggle="tab">
                                <span>03</span>
                                Lakukan Pembayaran
                            </a>
                        </li>
                        <li>
                            <a href="#order-complete" data-toggle="tab">
                                <span>04</span>
                                Desain Akan Dikirim Ke Email
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-10">
                    <!-- Tab panes -->
                    <div class="tab-content" style="color: black;">
                        <!-- shopping-cart start -->
                        <div class="tab-pane active" id="isi-form">
                            <div class="checkout-content box-shadow p-30">
                                <form action="/order/vector/store" method="post" enctype="multipart/form-data">
                                  {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6" style="margin-bottom: 10%">
                                            <div class="billing-details pr-10">
                                                <h6 class="widget-title border-left mb-20">Ketentuan Order Vector Art</h6>
                                                <li>
                                                  1. Mengisi <b>form pesanan</b> selengkap mungkin
                                                </li>
                                                <li>
                                                  2. Biaya desain vector <b>Rp {{number_format((Config::get('price.vector')),0,',','.')}} ,-</b>
                                                </li>
                                                <li>
                                                  3. Pengerjaan paling cepat adalah {{ Config::get('time-work.vector') }} hari
                                                </li>
                                            </div>
                                            <div class="billing-details pr-10" style="margin-top: 15%">
                                                <h6 class="widget-title border-left mb-20">Apa yang Akan Anda Dapatkan</h6>
                                                <li>
                                                  1. Anda akan mendapatkan file cdr, psd, jpg dan png
                                                </li>
                                            </div>
                                        </div>
                                        <!-- billing details -->
                                        <style media="screen">.custom-text{ color: black !important; }</style>
                                        <div class="col-md-6">
                                            <div class="billing-details pr-10" style="margin-bottom: 5%">
                                                <h6 class="widget-title border-left mb-20">Media Pengiriman Desain</h6>

                                                <input type="text" disabled value="{{ Auth::user()->email }}">
                                                @if ($errors->has('phone'))
                                                    <span class="text-danger">
                                                        <small><strong>{{ $errors->first('phone') }}</strong></small>
                                                    </span>
                                                @endif
                                                <input type="text" class="custom-text" value="{{ Auth::user()->phone }}" name="phone" placeholder="No HP atau WA" required>
                                                <input type="text" class="custom-text" value="{{ Auth::user()->sosmed }}" name="sosmed" placeholder="(Opsional)  LINE atau Telegram">

                                            </div>

                                            <div class="billing-details pr-10">
                                                <h6 class="widget-title border-left mb-20">Order Vector Art</h6>

                                                @if ($errors->has('content'))
                                                    <span class="text-danger">
                                                        <small><strong>{{ $errors->first('content') }}</strong></small>
                                                    </span>
                                                @endif
                                                <textarea value="{{ old('content') }}" name="content" class="custom-textarea" placeholder="Tuliskan kata-kata yang harus ada didalam desain vector, seperti ucapan selamat dsb" required></textarea>

                                                @if ($errors->has('file'))
                                                    <span class="text-danger">
                                                        <small><strong>{{ $errors->first('file') }}</strong></small>
                                                    </span>
                                                @endif
                                                <input type="file" name="file" class="form-control">
                                                <small><i> Lampirkan foto yang akan dijadikan vector. Max: 5MB (format: zip, rar, png, atau jpg) </i></small>

                                            </div>
                                            <div class="col-md-12">
                                                <button class="submit-btn-1 mt-30 btn-hover-1 form-control" type="submit">Pesan Desain</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>

@include('guest.includes.footer')

@endsection
