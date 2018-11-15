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
                          <h1 class="breadcrumbs-title">Theme</h1>
                          <ul class="breadcrumb-list">
                              <li><a href="/">Home</a></li>
                              <li>Theme</li>
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
                        <h2>All Theme</h2>
                    </div>
                </div>
            </div>

            <div class="blog">
                <div class="row">
                    <!-- blog-item start -->
                    @foreach($theme as $data)
                    <div class="col-md-4">
                        <div class="blog-item">

                          <style media="screen">
                          .frame-square {width: 100%;padding-top: 90%;overflow: hidden;position: relative;}
                          .frame-square img {width: 100%;height: auto;margin: auto;position: absolute;top: -100%;right: -100%;bottom: -100%;left: -100%;}
                          </style>

                          <div class="frame-square">
                            @php $img = \App\Models\ThemePhoto::with('photo')->where('theme_id',$data->id)->inRandomOrder()->first(); @endphp
                            @if($img != NULL)
                            <img src="{{asset('storage/theme/'.$img->photo->path)}}">
                            @else
                            <img src="{{asset('storage/theme/no-image.png')}}">
                            @endif
                          </div>

                            <div class="blog-desc">
                                <h5 class="blog-title"><a href="/theme/{{ $data->id }}">{{ $data->name }}</a></h5>
                                <p>{{ $data->description }}</p>
                                <div class="read-more">
                                    <a href="/theme/{{ $data->id }}">Read more</a>
                                </div>
                                <!-- <ul class="blog-meta">
                                    <li>
                                        <a href="#"><i class="zmdi zmdi-favorite"></i>89 Like</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="zmdi zmdi-comments"></i>59 Comments</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="zmdi zmdi-share"></i>29 Share</a>
                                    </li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- blog-item end -->
                </div>
            </div>
        </div>
    </div>

  </div>

  @include('guest.includes.footer')

@endsection
