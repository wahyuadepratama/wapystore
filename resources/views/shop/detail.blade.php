@extends('layouts.app-guest')

@section('head')
  <style media="screen"> /* All grid code is placed in a 'supports' rule (feature query) at the bottom of the CSS (Line 310). The 'supports' rule will only run if your browser supports CSS grid. Flexbox and floats are used as a fallback so that browsers which don't support grid will still recieve a similar layout. */ /* Base Styles */ :root { font-size: 10px; } *, *::before, *::after { box-sizing: border-box; } body { min-height: 100vh; background-color: #fafafa; color: #262626; padding-bottom: 3rem; } img { display: block; } .container { max-width: 93.5rem; margin: 0 auto; padding: 0 2rem; } .btn { display: inline-block; font: inherit; background: none; border: none; color: inherit; padding: 0; cursor: pointer; } .btn:focus { outline: 0.5rem auto #4d90fe; } .visually-hidden { position: absolute !important; height: 1px; width: 1px; overflow: hidden; clip: rect(1px, 1px, 1px, 1px); } /* Profile Section */ .profile { padding: 5rem 0; } .profile::after { content: ""; display: block; clear: both; } .profile-image { float: left; width: calc(33.333% - 1rem); display: flex; justify-content: center; align-items: center; margin-right: 3rem; } .profile-image img { border-radius: 50%; } .profile-user-settings, .profile-stats, .profile-bio { float: left; width: calc(66.666% - 2rem); } .profile-user-settings { margin-top: 1.1rem; } .profile-user-name { display: inline-block; font-size: 3.2rem; font-weight: 300; } .profile-edit-btn { font-size: 1.4rem; line-height: 1.8; border: 0.1rem solid #dbdbdb; border-radius: 0.3rem; padding: 0 2.4rem; margin-left: 2rem; } .profile-settings-btn { font-size: 2rem; margin-left: 1rem; } .profile-stats { margin-top: 2.3rem; } .profile-stats li { display: inline-block; font-size: 1.6rem; line-height: 1.5; margin-right: 4rem; cursor: pointer; } .profile-stats li:last-of-type { margin-right: 0; } .profile-bio { font-size: 1.6rem; font-weight: 400; line-height: 1.5; margin-top: 2.3rem; } .profile-real-name, .profile-stat-count, .profile-edit-btn { font-weight: 600; } /* Gallery Section */ .gallery { display: flex; flex-wrap: wrap; margin: -1rem -1rem; padding-bottom: 3rem; } .gallery-item { position: relative; flex: 1 0 22rem; margin: 1rem; color: #fff; cursor: pointer; } .gallery-item:hover .gallery-item-info, .gallery-item:focus .gallery-item-info { display: flex; justify-content: center; align-items: center; position: absolute; top: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.3); } .gallery-item-info { display: none; } .gallery-item-info li { display: inline-block; font-size: 1.7rem; font-weight: 600; } .gallery-item-likes { margin-right: 2.2rem; } .gallery-item-type { position: absolute; top: 1rem; right: 1rem; font-size: 2.5rem; text-shadow: 0.2rem 0.2rem 0.2rem rgba(0, 0, 0, 0.1); } .fa-clone, .fa-comment { transform: rotateY(180deg); } .gallery-image { width: 100%; height: 100%; object-fit: cover; } /* Loader */ .loader { width: 5rem; height: 5rem; border: 0.6rem solid #999; border-bottom-color: transparent; border-radius: 50%; margin: 0 auto; animation: loader 500ms linear infinite; } /* Media Query */ @media screen and (max-width: 40rem) { .profile { display: flex; flex-wrap: wrap; padding: 4rem 0; } .profile::after { display: none; } .profile-image, .profile-user-settings, .profile-bio, .profile-stats { float: none; width: auto; } .profile-image img { width: 7.7rem; } .profile-user-settings { flex-basis: calc(100% - 10.7rem); display: flex; flex-wrap: wrap; margin-top: 1rem; } .profile-user-name { font-size: 2.2rem; } .profile-edit-btn { order: 1; padding: 0; text-align: center; margin-top: 1rem; } .profile-edit-btn { margin-left: 0; } .profile-bio { font-size: 1.4rem; margin-top: 1.5rem; } .profile-edit-btn, .profile-bio, .profile-stats { flex-basis: 100%; } .profile-stats { order: 1; margin-top: 1.5rem; } .profile-stats ul { display: flex; text-align: center; padding: 1.2rem 0; border-top: 0.1rem solid #dadada; border-bottom: 0.1rem solid #dadada; } .profile-stats li { font-size: 1.4rem; flex: 1; margin: 0; } .profile-stat-count { display: block; } } /* Spinner Animation */ @keyframes loader { to { transform: rotate(360deg); } } /* The following code will only run if your browser supports CSS grid. Remove or comment-out the code block below to see how the browser will fall-back to flexbox & floated styling. */ @supports (display: grid) { .profile { display: grid; grid-template-columns: 1fr 2fr; grid-template-rows: repeat(3, auto); grid-column-gap: 3rem; align-items: center; } .profile-image { grid-row: 1 / -1; } .gallery { display: grid; grid-template-columns: repeat(auto-fit, minmax(22rem, 1fr)); grid-gap: 2rem; } .profile-image, .profile-user-settings, .profile-stats, .profile-bio, .gallery-item, .gallery { width: auto; margin: 0; } @media (max-width: 40rem) { .profile { grid-template-columns: auto 1fr; grid-row-gap: 1.5rem; } .profile-image { grid-row: 1 / 2; } .profile-user-settings { display: grid; grid-template-columns: auto 1fr; grid-gap: 1rem; } .profile-edit-btn, .profile-stats, .profile-bio { grid-column: 1 / -1; } .profile-user-settings, .profile-edit-btn, .profile-settings-btn, .profile-bio, .profile-stats { margin: 0; } } } </style>
@endsection

@section('content')

  @include('guest.includes.header')

  <!-- BREADCRUMBS SETCTION START -->
  <div class="breadcrumbs-section plr-200 mb-80" style="padding-top: 8%">

  </div>
  <!-- BREADCRUMBS SETCTION END -->

  <div id="page-content" class="page-wrapper">

    <div class="blog-section mb-50">
      <div class="container">

        <div class="row">
          <div class="col-md-6">
            <img class="img-responsive" src="{{asset('storage/stock/'.$stock->file)}}" alt="">
          </div>
          <div class="col-md-6">
            <!-- single-product-tab -->
            <div class="single-product-tab">
                <ul class="reviews-tab mb-20">
                    <li  class="active"><a href="#description" data-toggle="tab"><b>Deskripsi</b></a></li>
                    <li ><a href="#pesan" data-toggle="tab"><b>Pesan</b></a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="description">
                      <h2><b>{{ $stock->name }}</b></h2>
                      <h3><b> Rp {{number_format(($stock->price),0,',','.')}} ,- </b></h3>
                      <table>
                        <tr>
                          <td>Brand</td>
                          <td>:</td>
                          <td>{{ $stock->brand }}</td>
                        </tr>
                        <tr>
                          <td>Ukuran</td>
                          <td>:&nbsp;</td>
                          <td>{{ $stock->size }}</td>
                        </tr>
                        <tr>
                          <td>Berat</td>
                          <td>:</td>
                          <td>{{ $stock->weight }}</td>
                        </tr>
                        <tr>
                          <td>Bahan</td>
                          <td>:</td>
                          <td>{{ $stock->material }}</td>
                        </tr>
                        <tr>
                          <td>Warna</td>
                          <td>:</td>
                          <td>{{ $stock->color }}</td>
                        </tr>
                      </table><br>
                      <p>{{ $stock->description }}</p>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="pesan">
                      @if($message = Session::get('success'))
                      <div class="alert alert-danger" role="alert">
                        {{ $message }}
                      </div>
                      @endif
                        <form class="" action="/shop/{{$stock->id}}/store" method="post">
                          {{ csrf_field() }}
                          <input type="text" name="email" placeholder="Email" class="form-control" required style="color:black">
                          <input type="text" name="phone" placeholder="No Handphone" class="form-control" required style="color:black">
                          <input type="text" name="name" placeholder="Nama Penerima" class="form-control" required style="color:black">
                          <input type="text" name="size" placeholder="Ukuran" class="form-control" required style="color:black">
                          <input type="text" name="city" placeholder="Kota Tujuan" class="form-control" required style="color:black">
                          <input type="text" name="address" placeholder="Alamat Lengkap" class="form-control" required style="color:black">
                          <input type="text" name="postal" placeholder="Kode Pos (opsional)" class="form-control" style="color:black">
                          <input type="text" name="note" placeholder="Catatan (opsional)" class="form-control" style="color:black">
                          <input type="submit" value="Konfirmasi Pesanan" class="form-control btn-success" style="font-weight: bold">
                        </form>
                    </div>
                </div>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>

  <!-- START FOOTER AREA -->
  <footer id="footer" class="footer-area footer-2">
      <div class="footer-top footer-top-2 text-center ptb-60">
          <div class="container">
              <div class="row">
                  <div class="col-sm-12">
                      <ul class="footer-menu-2">
                          <li><a href="/">Home</a></li>
                          <li><a href="/portofolio">Portofolio</a></li>
                          <li><a href="/theme">Design Theme</a></li>
                          <li><a href="/contact">Contact</a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
      <div class="footer-bottom footer-bottom-2 text-center gray-bg">
          <div class="container">
              <div class="row">
                  <div class="col-md-4" style="margin-top: 1%; margin-bottom: 1%">
                      <div class="copyright-text copyright-text-2">
                          <p>&copy; <a href="https://wapydesign.com" target="_blank">WapyDesign</a> 2018. All Rights Reserved.</p>
                      </div>
                  </div>
                  <div class="col-md-4" style="margin-top: 2%; margin-bottom: 2%">
                      <ul class="footer-social footer-social-3">
                          <li>
                              <a class="google-plus" href="/contact" title="Email"><i class="zmdi zmdi-email"></i></a>
                          </li>
                          <li>
                              <a class="google-plus" href="/contact" title="Google"><i class="zmdi zmdi-google-plus"></i></a>
                          </li>
                          <li>
                              <a class="google-plus" href="/contact" title="Instagram"><i class="zmdi zmdi-instagram"></i></a>
                          </li>
                          <li>
                            <a class="google-plus" href="/contact" title="Whatsapp"><i class="zmdi zmdi-whatsapp"></i></a>
                          </li>
                      </ul>
                  </div>
                  <style media="screen">
                    .grid-bank{
                      display:grid;
                      grid-template-columns: 1fr 1fr 1fr;
                      padding-top: 10px;
                      grid-template-rows: auto;
                      grid-template-areas:
                      "bri bni mandiri"
                    }
                    .bri{grid-area: bri; }
                    .bni{grid-area: bni}
                    .mandiri{grid-area:mandiri}
                  </style>
                  <div class="col-md-4 col-sm-3" style="margin-top: 1%; margin-bottom: 1%">
                      <div class="grid-bank">
                        <div class="bni">
                          <a href="#"><img src="{{URL::asset('guest/images/icons/bni.png')}}" width="80%" alt=""></a>
                        </div>
                        <div class="bri">
                          <a href="#"><img src="{{URL::asset('guest/images/icons/bri.png')}}"  width="80%" alt=""></a>
                        </div>
                        <div class="mandiri">
                          <a href="#"><img src="{{URL::asset('guest/images/icons/mandiri.png')}}" width="80%" alt=""></a>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </footer>


@endsection
