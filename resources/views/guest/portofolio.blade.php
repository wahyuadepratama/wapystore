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
                          <h1 class="breadcrumbs-title">Portofolio</h1>
                          <ul class="breadcrumb-list">
                              <li><a href="/">Home</a></li>
                              <li>Portofolio</li>
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
                        <h2>Portofolio</h2>
                    </div>
                </div>
            </div>

            <div class="blog">
                <div class="row">
                    <!-- blog-item start -->
                    @foreach($portofolio as $data)
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="product-item product-item-2">
                          <div class="banner-item">
                              <div class="banner-img">
                                  <a href="/theme/{{ $data->theme->id }}"><img src="{{URL::asset('storage/theme/'. $data->path)}}" alt=""></a>
                              </div>
                          </div>
                          <ul class="action-button">
                              <center><strong><small>{{ $data->name }}</small></strong></center>
                          </ul>
                        </div>
                    </div>
                    @endforeach
                    <!-- blog-item end -->
                </div>
                <center>{{ $portofolio->links() }}</center>
            </div>
        </div>
    </div>

  </div>

  @include('guest.includes.footer')

@endsection
