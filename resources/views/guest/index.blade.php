@extends('layouts.app-guest')

@section('head')

@endsection

@section('content')

  @include('guest.includes.header')

<!-- START SLIDER AREA -->
<div class="slider-area">
    <div class="bend niceties preview-2">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->


  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="guest/images/home/background.png" alt="Chania" >
      <div class="carousel-caption">
        <div class="first-layer">
          <img src="https://www.wapydesign.com/guest/images/home/slide-1.png" alt="" class="img-responsive" width="85%">
        </div>
        <div class="second-layer">
          <div class="slider-content-1">
              <div class="title-container">
                  <div class="wow rotateInDownLeft" data-wow-duration="2s" data-wow-delay="0.5s">
                      <h6 class="slider2-title-1">DAPATKAN</h6>
                  </div>
                  <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
                      <h1 class="slider2-title-2">DISKON 10%</h1>
                  </div>
                  <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.5s">
                      <h2 class="slider2-title-3">UNTUK PEMESANAN PERTAMA</h2>
                  </div>
                  <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="2s">
                      <p class="slider2-title-4">Lakukan registrasi untuk mendapatkan diskon ini.</p>
                  </div>
                  <div class="slider-button wow fadeInUp" data-wow-duration="1s" data-wow-delay="2.5s">
                      <a href="/design" class="button extra-small button-black">
                          <span class="text-uppercase">ORDER NOW</span>
                      </a>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>

    <div class="item">
      <img src="guest/images/home/background.png" alt="Chicago">
      <div class="carousel-caption">
        <div class="first-layer">
          <div class="slider-content">
              <div class="title-container">
                  <div class="wow rotateInDownLeft" data-wow-duration="2s" data-wow-delay="0.5s">
                      <h6 class="slider2-title-1">TEMUKAN</h6>
                  </div>
                  <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
                      <h1 class="slider2-title-2">INSPIRASI DESAINMU</h1>
                  </div>
                  <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.5s">
                      <h2 class="slider2-title-3">DENGAN BERBAGAI TEMPLATE YANG KAMI SEDIAKAN</h2>
                  </div>
                  <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="2s">
                      <p class="slider2-title-4">Kami menyediakan beberapa template pilihan dengan kategori yang berbeda sebagai template desainmu.</p>
                  </div>
                  <div class="slider-button wow fadeInUp" data-wow-duration="1s" data-wow-delay="2.5s">
                      <a href="/theme" class="button extra-small button-black">
                          <span class="text-uppercase">SEE MORE</span>
                      </a>
                  </div>
              </div>
          </div>
        </div>
        <div class="second-layer">
            <img src="https://www.wapydesign.com/guest/images/home/slide-2.png" alt="" class="img-responsive" width="85%">
        </div>
      </div>
    </div>

  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="zmdi zmdi-hc-2x zmdi-long-arrow-left"></span>
    <span class="sr-only">Previous</span>
  </a>

  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="zmdi zmdi-hc-2x zmdi-long-arrow-right"></span>
    <span class="sr-only">Next</span>
  </a>
  <style media="screen">


  </style>
</div>

    </div>
</div>

<!-- START PAGE CONTENT -->

<div id="page-content" class="page-wrapper" style="margin-top: 5%">


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
                <div class="col-md-4" style="margin-top:2%; margin-bottom: 1%">
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
                      <a href="#"><img src="{{URL::asset('guest/images/icons/bni.png')}}" width="60%" alt=""></a>
                    </div>
                    <div class="bri">
                      <a href="#"><img src="{{URL::asset('guest/images/icons/bri.png')}}"  width="60%" alt=""></a>
                    </div>
                    <div class="mandiri">
                      <a href="#"><img src="{{URL::asset('guest/images/icons/mandiri.png')}}" width="60%" alt=""></a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>



@endsection
