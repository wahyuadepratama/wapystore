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
                        <h1 class="breadcrumbs-title">Calender</h1>
                        <ul class="breadcrumb-list">
                            <li><a href="/">Home</a></li>
                            <li>Calender</li>
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
                                <form action="/order/calender/store" method="post" enctype="multipart/form-data">
                                  {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6" style="margin-bottom: 10%;">
                                            <div class="billing-details pr-10">
                                                <h6 class="widget-title border-left mb-20">Ketentuan Order Calender</h6>
                                                <li>
                                                  1. Mengisi <b>form pesanan</b> selengkap mungkin
                                                </li>
                                                <li>
                                                  2. Biaya desain calender <b>Rp {{number_format((Config::get('price.calender')),0,',','.')}} ,-</b>
                                                </li>
                                                <li>
                                                  3. Pengerjaan paling cepat adalah {{ Config::get('time-work.calender') }} hari
                                                </li>
                                            </div>
                                            <div class="billing-details pr-10" style="margin-top: 15%">
                                                <h6 class="widget-title border-left mb-20">Apa yang Akan Anda Dapatkan</h6>
                                                <li>
                                                  1. Anda akan mendapatkan file cdr, psd, jpg dan png
                                                </li>
                                                <li>
                                                  2. Anda akan mendapatkan kesempatan revisi sebanyak {{ Config::get('revision.calender') }}x
                                                </li>
                                            </div>
                                        </div>
                                        <!-- billing details -->
                                        <style media="screen">.custom-text{ color: black !important; }</style>
                                        <div class="col-md-6">
                                            <div class="billing-details pr-10" style="margin-bottom: 5%">
                                                <h6 class="widget-title border-left mb-20">Media Pengiriman Desain</h6>

                                                <input type="text" disabled value="{{ Auth::user()->email }}" style="color: black">
                                                @if ($errors->has('phone'))
                                                    <span class="text-danger">
                                                        <small><strong>{{ $errors->first('phone') }}</strong></small>
                                                    </span>
                                                @endif
                                                <input type="text" class="custom-text" value="{{ Auth::user()->phone }}" name="phone" placeholder="No HP atau WA" required>
                                                <input type="text" class="custom-text" value="{{ Auth::user()->sosmed }}" name="sosmed" placeholder="(Opsional)  LINE atau Telegram">

                                            </div>

                                            <div class="billing-details pr-10">
                                                <h6 class="widget-title border-left mb-20">Order Calender</h6>

                                                @if ($errors->has('theme'))
                                                    <span class="text-danger">
                                                        <small><strong>{{ $errors->first('theme') }}</strong></small>
                                                    </span>
                                                @endif

                                                <select class="form-control custom-select" name="theme" onchange="myFunction()" id="theme">
                                                  <option value="Bebas">Pilih Tema Desain</option>
                                                  @foreach($theme as $value)
                                                  <option value="{{ $value->name }}">{{ $value->name }}</option>
                                                  @endforeach
                                                  <option value="create_own">Tulis Tema Sendiri</option>
                                                </select>

                                                  <script type="text/javascript">
                                                  // In your Javascript (external .js resource or <script> tag)
                                                    $(document).ready(function() {
                                                      $('.custom-select').select2();
                                                    });
                                                  </script>
                                                <!-- <select class="custom-select" name="theme" onchange="myFunction()" id="theme">
                                                    <option value="Bebas">Pilih Tema Desain</option>
                                                    @foreach($theme as $value)
                                                    <option value="{{ $value->name }}">{{ $value->name }}</option>
                                                    @endforeach
                                                    <option value="create_own">Tulis Tema Sendiri</option>
                                                </select> -->
                                                <div id="create_own"></div><br>
                                                <small><i> *Desain yang akan dibuat tidak akan sama persis dengan tema yang dipilih, namun hanya sebagai gambaran seperti apa warna dan model desainya </i></small>
                                                <small><i> *Pilih 'tulis tema sendiri' jika tidak ada pilihan tema yang sesuai bagi anda </i></small>
                                                <br><br>

                                                <script>
                                                function myFunction() {

                                                    var data = document.getElementById("theme").value;
                                                    if(data == "create_own"){
                                                      var input = document.createElement("input");
                                                      input.setAttribute('type', 'text');
                                                      input.setAttribute('placeholder', 'Tulis permintaan tema disini..');
                                                      input.setAttribute('name','theme');

                                                      var parent = document.getElementById("create_own");
                                                      parent.appendChild(input);

                                                      document.getElementById("theme").disabled = true;
                                                    }
                                                }
                                                </script>

                                                @if ($errors->has('content'))
                                                    <span class="text-danger">
                                                        <small><strong>{{ $errors->first('content') }}</strong></small>
                                                    </span>
                                                @endif
                                                <textarea value="{{ old('content') }}" name="content" class="custom-textarea" placeholder="Jelaskan model calender yang ingin dipesan dan keterangan lainnya " required></textarea>

                                                @if ($errors->has('file'))
                                                    <span class="text-danger">
                                                        <small><strong>{{ $errors->first('file') }}</strong></small>
                                                    </span>
                                                @endif
                                                <input type="file" name="file" class="form-control">
                                                <small><i> Lampirkan file pendukung yang harus ada di dalam calender, seperti logo, dsb. Max: 5MB (format: zip, rar, png, atau jpg) </i></small>
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
