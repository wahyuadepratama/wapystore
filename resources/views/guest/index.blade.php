@extends('layouts.app-guest')

@section('head')

@endsection

@section('content')

  @include('guest.includes.header')

<!-- START SLIDER AREA -->
<div class="slider-area slider-2">
    <div class="bend niceties preview-2">
        <div id="nivoslider-2" class="slides">
            <img src="{{URL::asset('guest/img/slider/slider-2/slider-1.jpg')}}" alt="" title="#slider-direction-1"  />
            <img src="{{URL::asset('guest/img/slider/slider-2/slider-1.jpg')}}" alt="" title="#slider-direction-2"  />
            <img src="{{URL::asset('guest/img/slider/slider-2/slider-1.jpg')}}" alt="" title="#slider-direction-3"  />
            <img src="{{URL::asset('guest/img/slider/slider-2/slider-1.jpg')}}" alt="" title="#slider-direction-4"  />
            <img src="{{URL::asset('guest/img/slider/slider-2/slider-1.jpg')}}" alt="" title="#slider-direction-5"  />
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
                        <a href="#" class="button extra-small button-black">
                            <span class="text-uppercase">REGISTRASI NOW</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- layer 1 -->
            <div class="slider-content-1-image">
                <div class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                    <div class="layer-1-1">
                        <img src="{{URL::asset('guest/img/slider/slider-2/layer-1.png')}}" alt="" />
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
                        <h1 class="slider2-title-2">INSPIRASI DESIGMU</h1>
                    </div>
                    <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.5s">
                        <h2 class="slider2-title-3">dengan berbagai template yang kami sediakan</h2>
                    </div>
                    <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="2s">
                        <p class="slider2-title-4">Kami menyediakan beberapa template pilihan dengan kategori yang berbeda sebagai template designmu.</p>
                    </div>
                    <div class="slider-button wow fadeInUp" data-wow-duration="1s" data-wow-delay="2.5s">
                        <a href="#" class="button extra-small button-black">
                            <span class="text-uppercase">LIHAT TEMPLATE</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- layer 1 -->
            <div class="wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="layer-1-1 layer-2-1">
                    <img src="{{URL::asset('guest/img/slider/slider-2/layer-2.png')}}" alt="" />
                </div>
            </div>
        </div>
        <!-- ===== direction 3 ===== -->
        <div id="slider-direction-3" class="slider-direction">
            <div class="slider-content-1">
                <div class="title-container">
                    <div class="wow rotateInDownLeft" data-wow-duration="2s" data-wow-delay="0.5s">
                        <h6 class="slider2-title-1">Best price : $866</h6>
                    </div>
                    <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
                        <h1 class="slider2-title-2">new smart phone</h1>
                    </div>
                    <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.5s">
                        <h2 class="slider2-title-3">Samsung grand 6</h2>
                    </div>
                    <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="2s">
                        <p class="slider2-title-4">There are many variations of passages of Lorem Ipsum availables, but the majority have suffered alteration in some form.</p>
                    </div>
                    <div class="slider-button wow fadeInUp" data-wow-duration="1s" data-wow-delay="2.5s">
                        <a href="#" class="button extra-small button-black" >
                            <span class="text-uppercase">Buy now</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- layer 1 -->
            <div class="slider-content-1-image">
                <div class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                    <div class="layer-1-1">
                        <img src="{{URL::asset('guest/img/slider/slider-2/layer-1.png')}}" alt="" />
                    </div>
                </div>
            </div>
        </div>
        <!-- ===== direction 4 ===== -->
        <div id="slider-direction-4" class="slider-direction">
            <div class="slider-content-2">
                <div class="title-container">
                    <div class="wow rotateInDownLeft" data-wow-duration="2s" data-wow-delay="0.5s">
                        <h6 class="slider2-title-1">Best price : $866</h6>
                    </div>
                    <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
                        <h1 class="slider2-title-2">new smart phone</h1>
                    </div>
                    <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.5s">
                        <h2 class="slider2-title-3">Samsung grand 6</h2>
                    </div>
                    <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="2s">
                        <p class="slider2-title-4">There are many variations of passages of Lorem Ipsum availables, but the majority have suffered alteration in some form.</p>
                    </div>
                    <div class="slider-button wow fadeInUp" data-wow-duration="1s" data-wow-delay="2.5s">
                        <a href="#" class="button extra-small button-black">
                            <span class="text-uppercase">Buy now</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- layer 1 -->
            <div class="wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="layer-1-1 layer-2-1">
                    <img src="{{URL::asset('guest/img/slider/slider-2/layer-2.png')}}" alt="" />
                </div>
            </div>
        </div>
        <!-- ===== direction 5 ===== -->
        <div id="slider-direction-5" class="slider-direction">
            <div class="slider-content-1">
                <div class="title-container">
                    <div class="wow rotateInDownLeft" data-wow-duration="2s" data-wow-delay="0.5s">
                        <h6 class="slider2-title-1">Best price : $866</h6>
                    </div>
                    <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
                        <h1 class="slider2-title-2">new smart phone</h1>
                    </div>
                    <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.5s">
                        <h2 class="slider2-title-3">Samsung grand 6</h2>
                    </div>
                    <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="2s">
                        <p class="slider2-title-4">There are many variations of passages of Lorem Ipsum availables, but the majority have suffered alteration in some form.</p>
                    </div>
                    <div class="slider-button wow fadeInUp" data-wow-duration="1s" data-wow-delay="2.5s">
                        <a href="#" class="button extra-small button-black">
                            <span class="text-uppercase">Buy now</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- layer 1 -->
            <div class="slider-content-1-image">
                <div class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
                    <div class="layer-1-1">
                        <img src="{{URL::asset('guest/img/slider/slider-2/layer-1.png')}}" alt="" />
                    </div>
                </div>
            </div>
        </div>
        <!-- ==== -->
    </div>
</div>


<!-- START PAGE CONTENT -->
<section id="page-content" class="page-wrapper">

    <!-- UP COMMING PRODUCT SECTION START -->
    <div class="up-comming-product-section ptb-60">
        <div class="container">
            <div class="row">
                <div class="col-md-3 hidden-sm col-xs-12">
                    <div class="banner-item banner-1">
                        <div class="ribbon-price">
                            <span><small>Rp {{number_format((Config::get('price.spanduk')),0,',','.')}}</small></span>
                        </div>
                        <div class="banner-img">
                            <a href="#"><img src="{{URL::asset('storage/theme/no-image.png')}}" alt=""></a>
                        </div>
                        <div class="banner-info">
                            <h3 style="padding-left: 15%"><a href="/order/spanduk">Spanduk</a></h3>
                            <ul class="banner-featured-list">
                                <li>
                                    <i class="zmdi zmdi-check"></i><span>Lorem ipsum dolor</span>
                                </li>
                            </ul>
                        </div>
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
