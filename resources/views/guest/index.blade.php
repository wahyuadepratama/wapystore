@extends('layouts.app-guest')

@section('head')
  <style media="screen"> /* All grid code is placed in a 'supports' rule (feature query) at the bottom of the CSS (Line 310). The 'supports' rule will only run if your browser supports CSS grid. Flexbox and floats are used as a fallback so that browsers which don't support grid will still recieve a similar layout. */ /* Base Styles */ :root { font-size: 10px; } *, *::before, *::after { box-sizing: border-box; } body { font-family: "Open Sans", Arial, sans-serif; min-height: 100vh; background-color: #fafafa; color: #262626; padding-bottom: 3rem; } img { display: block; } .container { max-width: 93.5rem; margin: 0 auto; padding: 0 2rem; } .btn { display: inline-block; font: inherit; background: none; border: none; color: inherit; padding: 0; cursor: pointer; } .btn:focus { outline: 0.5rem auto #4d90fe; } .visually-hidden { position: absolute !important; height: 1px; width: 1px; overflow: hidden; clip: rect(1px, 1px, 1px, 1px); } /* Profile Section */ .profile { padding: 5rem 0; } .profile::after { content: ""; display: block; clear: both; } .profile-image { float: left; width: calc(33.333% - 1rem); display: flex; justify-content: center; align-items: center; margin-right: 3rem; } .profile-image img { border-radius: 50%; } .profile-user-settings, .profile-stats, .profile-bio { float: left; width: calc(66.666% - 2rem); } .profile-user-settings { margin-top: 1.1rem; } .profile-user-name { display: inline-block; font-size: 3.2rem; font-weight: 300; } .profile-edit-btn { font-size: 1.4rem; line-height: 1.8; border: 0.1rem solid #dbdbdb; border-radius: 0.3rem; padding: 0 2.4rem; margin-left: 2rem; } .profile-settings-btn { font-size: 2rem; margin-left: 1rem; } .profile-stats { margin-top: 2.3rem; } .profile-stats li { display: inline-block; font-size: 1.6rem; line-height: 1.5; margin-right: 4rem; cursor: pointer; } .profile-stats li:last-of-type { margin-right: 0; } .profile-bio { font-size: 1.6rem; font-weight: 400; line-height: 1.5; margin-top: 2.3rem; } .profile-real-name, .profile-stat-count, .profile-edit-btn { font-weight: 600; } /* Gallery Section */ .gallery { display: flex; flex-wrap: wrap; margin: -1rem -1rem; padding-bottom: 3rem; } .gallery-item { position: relative; flex: 1 0 22rem; margin: 1rem; color: #fff; cursor: pointer; } .gallery-item:hover .gallery-item-info, .gallery-item:focus .gallery-item-info { display: flex; justify-content: center; align-items: center; position: absolute; top: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.3); } .gallery-item-info { display: none; } .gallery-item-info li { display: inline-block; font-size: 1.7rem; font-weight: 600; } .gallery-item-likes { margin-right: 2.2rem; } .gallery-item-type { position: absolute; top: 1rem; right: 1rem; font-size: 2.5rem; text-shadow: 0.2rem 0.2rem 0.2rem rgba(0, 0, 0, 0.1); } .fa-clone, .fa-comment { transform: rotateY(180deg); } .gallery-image { width: 100%; height: 100%; object-fit: cover; } /* Loader */ .loader { width: 5rem; height: 5rem; border: 0.6rem solid #999; border-bottom-color: transparent; border-radius: 50%; margin: 0 auto; animation: loader 500ms linear infinite; } /* Media Query */ @media screen and (max-width: 40rem) { .profile { display: flex; flex-wrap: wrap; padding: 4rem 0; } .profile::after { display: none; } .profile-image, .profile-user-settings, .profile-bio, .profile-stats { float: none; width: auto; } .profile-image img { width: 7.7rem; } .profile-user-settings { flex-basis: calc(100% - 10.7rem); display: flex; flex-wrap: wrap; margin-top: 1rem; } .profile-user-name { font-size: 2.2rem; } .profile-edit-btn { order: 1; padding: 0; text-align: center; margin-top: 1rem; } .profile-edit-btn { margin-left: 0; } .profile-bio { font-size: 1.4rem; margin-top: 1.5rem; } .profile-edit-btn, .profile-bio, .profile-stats { flex-basis: 100%; } .profile-stats { order: 1; margin-top: 1.5rem; } .profile-stats ul { display: flex; text-align: center; padding: 1.2rem 0; border-top: 0.1rem solid #dadada; border-bottom: 0.1rem solid #dadada; } .profile-stats li { font-size: 1.4rem; flex: 1; margin: 0; } .profile-stat-count { display: block; } } /* Spinner Animation */ @keyframes loader { to { transform: rotate(360deg); } } /* The following code will only run if your browser supports CSS grid. Remove or comment-out the code block below to see how the browser will fall-back to flexbox & floated styling. */ @supports (display: grid) { .profile { display: grid; grid-template-columns: 1fr 2fr; grid-template-rows: repeat(3, auto); grid-column-gap: 3rem; align-items: center; } .profile-image { grid-row: 1 / -1; } .gallery { display: grid; grid-template-columns: repeat(auto-fit, minmax(22rem, 1fr)); grid-gap: 2rem; } .profile-image, .profile-user-settings, .profile-stats, .profile-bio, .gallery-item, .gallery { width: auto; margin: 0; } @media (max-width: 40rem) { .profile { grid-template-columns: auto 1fr; grid-row-gap: 1.5rem; } .profile-image { grid-row: 1 / 2; } .profile-user-settings { display: grid; grid-template-columns: auto 1fr; grid-gap: 1rem; } .profile-edit-btn, .profile-stats, .profile-bio { grid-column: 1 / -1; } .profile-user-settings, .profile-edit-btn, .profile-settings-btn, .profile-bio, .profile-stats { margin: 0; } } } </style>
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

<div id="page-content" class="page-wrapper" style="margin-top: 5%">

  <div class="blog-section mb-50">
    <div class="container">
      <div class="gallery">
        @foreach($portofolio as $data)
        <div class="gallery-item" tabindex="0">
          <img src="{{URL::asset('storage/theme/'. $data->path)}}" class="gallery-image" alt="">
          <div class="gallery-item-info">
            <center>
              {{ $data->name }}<br>
              <a href="/theme/@php $theme = \App\Models\ThemePhoto::where('photo_id', $data->id)->first(); echo $theme->theme_id; @endphp" class="btn-sm btn-primary">View</a>
            </center>
          </div>
        </div>
        @endforeach
      </div>
      <center>
        <a href="/portofolio" class="button extra-small" style="background-color: red;">
            <span class="text-uppercase">More Portofolio</span>
        </a>
      </center>
    </div>
  </div>

</div>

<!-- START FOOTER AREA -->


@endsection
