@extends('layouts.app-guest')

@section('head')

@endsection

@section('content')

  @include('guest.includes.header')

<!-- START SLIDER AREA -->
<div class="slider-area slider-2">
    <div class="bend niceties preview-2">
        <div id="nivoslider-2" class="slides">
            <img src="{{URL::asset('guest/images/home/background.png')}}" alt="" title="#slider-direction-1"/>
            <img src="{{URL::asset('guest/images/home/background.png')}}"  alt="" title="#slider-direction-2"/>
        </div>
        <!-- ===== direction 1 ===== -->
        <div id="slider-direction-1" class="slider-direction">
            <div class="slider-content-1">
                <div class="title-container">
                    <div class="wow rotateInDownLeft" data-wow-duration="2s" data-wow-delay="0.5s">
                        <h6 class="slider2-title-1">Dapatkan</h6>
                    </div>
                    <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
                        <h1 class="slider2-title-2">DISKON 10%</h1>
                    </div>
                    <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.5s">
                        <h2 class="slider2-title-3">Untuk pemesanan pertama </h2>
                    </div>
                    <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="2s">
                        <p class="slider2-title-4">Lakukan registrasi untuk mendapatkan diskon ini.</p>
                    </div>
                    <div class="slider-button wow fadeInUp" data-wow-duration="1s" data-wow-delay="2.5s">
                        <a href="/login" class="button extra-small" style="background-color: red;">
                            <span class="text-uppercase">REGISTRASI</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- layer 1 -->
            <div class="slider-content-1-image">
                <div class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                    <div class="layer-1-1">
                        <img src="{{URL::asset('guest/images/home/slide-1.png')}}" alt="" />
                    </div>
                </div>
            </div>
        </div>
        <!-- ===== direction 2 ===== -->
        <div id="slider-direction-2" class="slider-direction">
            <div class="slider-content-2">
                <div class="title-container">
                    <div class="wow rotateInDownLeft" data-wow-duration="2s" data-wow-delay="0.5s">
                        <h6 class="slider2-title-1">Temukan</h6>
                    </div>
                    <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
                        <h1 class="slider2-title-2">INSPIRASI DESAINMU</h1>
                    </div>
                    <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.5s">
                        <h2 class="slider2-title-3">dengan berbagai template yang kami sediakan</h2>
                    </div>
                    <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="2s">
                        <p class="slider2-title-4">Kami menyediakan beberapa template pilihan dengan kategori yang berbeda sebagai template desainmu.</p>
                    </div>
                    <div class="slider-button wow fadeInUp" data-wow-duration="1s" data-wow-delay="2.5s">
                        <a href="/portofolio" class="button extra-small" style="background-color: red">
                            <span class="text-uppercase">LIHAT TEMPLATE</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- layer 1 -->
            <div class="wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="layer-1-1 layer-2-1">
                    <img src="{{URL::asset('guest/images/home/slide-2.png')}}" alt="" />
                </div>
            </div>
        </div>
    </div>
</div>


<!-- START PAGE CONTENT -->
<section id="page-content" class="page-wrapper">

    <!-- UP COMMING PRODUCT SECTION START -->
    <div class="up-comming-product-section ptb-60">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-12" style="padding: 4%">
                    <div class="product-item product-item-2">
                      <div class="banner-item banner-1">
                          <div class="ribbon-price">
                              <span><small>Rp {{number_format((Config::get('price.spanduk')),0,',','.')}}</small></span>
                          </div>
                          <div class="banner-img">
                              <a href="/order/spanduk"><img src="{{URL::asset('guest/images/home/spanduk.png')}}" alt=""></a>
                          </div>
                      </div>
                      <ul class="action-button">
                          <strong><small>Pengerjaan minimal {{ Config::get('time-work.spanduk') }} hari</small></strong>
                      </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12" style="padding: 4%">
                    <div class="product-item product-item-2">
                        <div class="banner-item banner-1">
                            <div class="ribbon-price">
                                <span><small>Rp {{number_format((Config::get('price.poster')),0,',','.')}}</small></span>
                            </div>
                            <div class="banner-img">
                                <a href="/order/poster"><img src="{{URL::asset('guest/images/home/poster.png')}}" alt=""></a>
                            </div>
                        </div>
                        <ul class="action-button">
                            <strong><small>Pengerjaan minimal {{ Config::get('time-work.poster') }} hari</small></strong>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12" style="padding: 4%">
                    <div class="product-item product-item-2">
                      <div class="banner-item banner-1">
                          <div class="ribbon-price">
                              <span><small>Rp {{number_format((Config::get('price.banner')),0,',','.')}}</small></span>
                          </div>
                          <div class="banner-img">
                              <a href="/order/banner"><img src="{{URL::asset('guest/images/home/banner.png')}}" alt=""></a>
                          </div>
                      </div>
                      <ul class="action-button">
                          <strong><small>Pengerjaan minimal {{ Config::get('time-work.banner') }} hari</small></strong>
                      </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12" style="padding: 4%">
                    <div class="product-item product-item-2">
                      <div class="banner-item banner-1">
                          <div class="ribbon-price">
                              <span><small>Rp {{number_format((Config::get('price.pamflet')),0,',','.')}}</small></span>
                          </div>
                          <div class="banner-img">
                              <a href="/order/pamflet"><img src="{{URL::asset('guest/images/home/pamflet.png')}}" alt=""></a>
                          </div>
                      </div>
                      <ul class="action-button">
                          <strong><small>Pengerjaan minimal {{ Config::get('time-work.pamflet') }} hari</small></strong>
                      </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12" style="padding: 4%">
                    <div class="product-item product-item-2">
                      <div class="banner-item banner-1">
                          <div class="ribbon-price">
                              <span><small>Rp {{number_format((Config::get('price.id-card')),0,',','.')}}</small></span>
                          </div>
                          <div class="banner-img">
                              <a href="/order/id-card"><img src="{{URL::asset('guest/images/home/id-card.png')}}" alt=""></a>
                          </div>
                      </div>
                      <ul class="action-button">
                          <strong><small>Pengerjaan minimal {{ Config::get('time-work.id-card') }} hari</small></strong>
                      </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12" style="padding: 4%">
                    <div class="product-item product-item-2">
                      <div class="banner-item banner-1">
                          <div class="ribbon-price">
                              <span><small>Rp {{number_format((Config::get('price.logo')),0,',','.')}}</small></span>
                          </div>
                          <div class="banner-img">
                              <a href="/order/logo"><img src="{{URL::asset('guest/images/home/logo.png')}}" alt=""></a>
                          </div>
                      </div>
                      <ul class="action-button">
                          <strong><small>Pengerjaan minimal {{ Config::get('time-work.logo') }} hari</small></strong>
                      </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12" style="padding: 4%">
                    <div class="product-item product-item-2">
                      <div class="banner-item banner-1">
                          <div class="ribbon-price">
                              <span><small>Rp {{number_format((Config::get('price.cv')),0,',','.')}}</small></span>
                          </div>
                          <div class="banner-img">
                              <a href="/order/cv"><img src="{{URL::asset('guest/images/home/cv.png')}}" alt=""></a>
                          </div>
                      </div>
                      <ul class="action-button">
                          <strong><small>Pengerjaan minimal {{ Config::get('time-work.cv') }} hari</small></strong>
                      </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4 col-xs-12" style="padding: 4%">
                    <div class="product-item product-item-2">
                      <div class="banner-item banner-1">
                          <div class="ribbon-price">
                              <span><small>Rp {{number_format((Config::get('price.book-cover')),0,',','.')}}</small></span>
                          </div>
                          <div class="banner-img">
                              <a href="/order/book-cover"><img src="{{URL::asset('guest/images/home/book-cover.png')}}" alt=""></a>
                          </div>
                      </div>
                      <ul class="action-button">
                          <strong><small>Pengerjaan minimal {{ Config::get('time-work.book-cover') }} hari</small></strong>
                      </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- UP COMMING PRODUCT SECTION END -->

</section>

<!-- START FOOTER AREA -->

  @include('guest.includes.footer')

@endsection
