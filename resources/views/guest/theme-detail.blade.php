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
                          <h1 class="breadcrumbs-title">{{ $theme->name }}</h1>
                          <ul class="breadcrumb-list">
                              <li><a href="/">Home</a></li>
                              <li><a href="/theme">Theme</a></li>
                              <li>{{ $theme->name }}</li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- BREADCRUMBS SETCTION END -->

  <div id="page-content" class="page-wrapper">

    <div class="blog-section mb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-left mb-40">
                        <h2>Detail Theme</h2>
                    </div>
                </div>
            </div>

            <div class="blog">
                <div class="row">

                    <!-- blog-item start -->
                    <div class="col-md-12 col-sm-12 col-xs-12" style="padding-left:20%; padding-right:20%;">
                        <div class="imgs-zoom-area">
                            <img id="zoom_03" src="{{asset('storage/theme/'.$theme->path)}}" data-zoom-image="{{asset('storage/theme/'.$theme->path)}}" width="100%">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div id="gallery_01" class="carousel-btn slick-arrow-3 mt-60">
                                      @foreach($detail as $data)
                                        <div class="p-c">
                                            <a href="#" data-image="{{asset('storage/theme/'.$data->path)}}" data-zoom-image="{{asset('storage/theme/'.$data->path)}}">
                                                <img class="zoom_03" src="{{asset('storage/theme/'.$data->path)}}" alt="">
                                            </a>
                                        </div>
                                      @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- blog-item end -->
                </div>
            </div>
        </div>
    </div>

  </div>

  @include('guest.includes.footer')

@endsection
