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
                        <h1 class="breadcrumbs-title">CV</h1>
                        <ul class="breadcrumb-list">
                            <li><a href="/">Home</a></li>
                            <li>{{ $theme->name }}</li>
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
                                Konfirmasi Pembayaran
                            </a>
                        </li>
                        <li>
                            <a href="#order-complete" data-toggle="tab">
                                <span>03</span>
                                Desain Akan Dikirimkan
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
                                <form action="/order/cv@store" method="post" enctype="multipart/form-data">
                                  {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6" style="margin-bottom: 10%">
                                            <div class="billing-details pr-10">
                                                <h6 class="widget-title border-left mb-20">Order CV</h6>
                                                <li>
                                                  1. Anda akan memesan CV dengan desain <b>"{{ $theme->name }}"</b>
                                                </li>
                                                <li>
                                                  2. Biaya desain CV <b>Rp {{number_format((20000),0,',','.')}} ,-</b>
                                                </li>
                                                <li>
                                                  3. Setelah melakukan pemesanan, kirim bukti pembayaran ke <a target="_blank" rel="noopener noreferrer" href="https://wa.me/6289676253311">WhatsApp (Klik Link Ini)</a>
                                                </li>
                                                <li>
                                                  4. Jika ada pertanyaan, silahkan langsung tanyakan ke nomor WhatsApp diatas
                                                </li>
                                            </div>
                                            <div class="billing-details pr-10" style="margin-top: 15%">
                                                <h6 class="widget-title border-left mb-20">Info Pembayaran</h6>
                                                <li>
                                                  - Rek. Mandiri <b>111-00-0755133-2</b> (Wahyu Ade Pratama)
                                                </li>
                                                <li>
                                                  - Rek. BRI <b>7241-01-005830-53-8</b> (Wahyu Ade Pratama)
                                                </li>
                                                <li>
                                                  - Rek. BNI <b>0682171537</b> (Wahyu Ade Pratama)
                                                </li>
                                            </div>
                                        </div>
                                        <!-- billing details -->
                                        <style media="screen">.custom-text{ color: black !important; }</style>
                                        <div class="col-md-6">
                                            <div class="billing-details pr-10" style="margin-bottom: 5%">
                                                <h6 class="widget-title border-left mb-20">Data Pemesan</h6>

                                                @if ($errors->has('phone'))
                                                    <span class="text-danger">
                                                        <small><strong>{{ $errors->first('phone') }}</strong></small>
                                                    </span>
                                                @endif
                                                <input type="text" class="custom-text" name="name" placeholder="Nama Pemesan" required>
                                                <input type="text" class="custom-text" name="phone" placeholder="No HP atau WA" required>

                                                @if ($errors->has('theme'))
                                                    <span class="text-danger">
                                                        <small><strong>{{ $errors->first('theme') }}</strong></small>
                                                    </span>
                                                @endif

                                                @if ($errors->has('note'))
                                                    <span class="text-danger">
                                                        <small><strong>{{ $errors->first('note') }}</strong></small>
                                                    </span>
                                                @endif
                                                <textarea value="{{ old('note') }}" name="note" class="custom-textarea" placeholder="(Boleh Dikosongkan) Tambahkan catatan untuk designer. Seperti: warna yang digunakan, posisi konten, dsb"></textarea><br><br>

                                                @if ($errors->has('file'))
                                                    <span class="text-danger">
                                                        <small><strong>{{ $errors->first('file') }}</strong></small>
                                                    </span>
                                                @endif
                                                <input type="file" name="file" class="form-control">
                                                <small><i> Lampirkan CV yang akan didesain disini atau boleh juga melalui <a target="_blank" rel="noopener noreferrer" href="https://wa.me/6289676253311?text=Saya%20sudah%20mengisi%20data.%20Berikut%20saya%20lampirkan%20CV%20yang%20akan%20di%20desain.">WhatsApp (Klik Link Ini)</a></i></small>
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
