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
                          <h1 class="breadcrumbs-title">Home / Designer</h1>
                          <ul class="breadcrumb-list">
                              <li><a href="index.html">Home</a></li>
                              <li>Home / Designer</li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- BREADCRUMBS SETCTION END -->

  <div id="page-content" class="page-wrapper">

    <style media="screen">
      .photo-rofile{
        height: 100px !important;
        width: 100px !important;
        border-radius: 50%;
        background-color: pink;
      }
    </style>

      <!-- LOGIN SECTION START -->
      <div class="login-section mb-80">
          <div class="container">
              <div class="row">
                  <div class="col-md-3">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <div class="panel-title">
                          <center>Designer Information</center>
                        </div>
                      </div>
                      <div class="panel-body">
                        <div class="photo-profile" style="
                          height: 125px !important;
                          width: 125px !important;
                          border-radius: 50%;
                          background-color: pink;
                          margin: 0 auto;">
                        </div>
                        <div class="" style="text-align:center">
                          <p style="padding:5px;color:black"><span style="font-size:20px;padding:5px;">{{ Auth::user()->name }}</span> <br>
                            <span>{{ Auth::user()->email }}</span><br>
                            <span>{{ Auth::user()->phone }}</span><br>
                            <span>
                              <strong style="font-size:15px">IDR Rp {{number_format((Auth::user()->income),0,',','.')}} ,-<strong>
                            </span>
                          </p>
                        </div>
                      </div>
                    </div>

                  </div>
                  <!-- new-Designers -->
                  <div class="col-md-9">
                    <!-- My Order info -->
                    @if(!$job->isEmpty())
                    @foreach($job as $data)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a  href="#My_order_info">No. Orderan #{{ $data->id }}</a>
                            </h4>
                        </div>
                        <div id="My_order_info" role="tabpanel" >
                            <div class="panel-body">
                                    <!-- our order -->
                                    <div class="payment-details">
                                      <div class="col-md-12 order-payment">
                                        <div class="col-md-3">
                                          <span class"td-title-1">Waktu Order</span>
                                        </div>
                                        <div class="col-md-9">
                                          <p class="td-title-2">{{ $data->order->updated_at }}</p>
                                        </div>
                                      </div>
                                      <div class="col-md-12 order-payment">
                                        <div class="col-md-3">
                                          <span class"td-title-1">Product Name</span>
                                        </div>
                                        <div class="col-md-9">
                                          <p class="td-title-2">{{ $data->order->name }}</p>
                                        </div>
                                      </div>
                                      <div class="col-md-12 order-payment">
                                        <div class="col-md-3">
                                          <span class"td-title-1">Price</span>
                                        </div>
                                        <div class="col-md-9">
                                          <p class="td-title-2">{{ $data->order->price }}</p>
                                        </div>
                                      </div>
                                      @if($data->order->discount_status != NULL)
                                      <div class="col-md-12 order-payment">
                                        <div class="col-md-3">
                                          <span class"td-title-1">Discount</span>
                                        </div>
                                        <div class="col-md-9">
                                          <p class="td-title-2">{{ $data->order->discount_status }}</p>
                                        </div>
                                      </div>
                                      @endif
                                      <div class="col-md-12 order-payment">
                                        <div class="col-md-3">
                                          <span class"td-title-1">Theme</span>
                                        </div>
                                        <div class="col-md-9">
                                          <p class="td-title-2">{{ $data->order->theme }}</p>
                                        </div>
                                      </div>
                                      @if($data->order->revision != NULL)
                                      <div class="col-md-12 order-payment">
                                        <div class="col-md-3">
                                          <span class"td-title-1">Opportunities for revision</span>
                                        </div>
                                        <div class="col-md-9">
                                          <p class="td-title-2">{{ $data->order->revision }}</p>
                                        </div>
                                      </div>
                                      @endif
                                      <div class="col-md-12 order-payment">
                                        <div class="col-md-3">
                                          <span class"td-title-1">Status</span>
                                        </div>
                                        <div class="col-md-9">
                                          <p class="td-title-2">
                                            @if($data->order->status == "waiting")
                                              Sedang Menuggu Konfirmasi Designer
                                            @endif
                                            @if($data->order->status == "on_progress")
                                              Sedang Dalam Pengerjaan
                                            @endif
                                            @if($data->order->status == "revision")
                                              Sedang Dalam Proses Revisi
                                            @endif
                                          </p>
                                        </div>
                                      </div>
                                      <div class="col-md-12 order-payment">
                                        <div class="col-md-3">
                                          <span class"td-title-1">Ukuran</span>
                                        </div>
                                        <div class="col-md-9">
                                          <p class="td-title-2">{{ $data->order->size_long }} x {{ $data->order->size_wide }} (cm)</p>
                                        </div>
                                      </div>
                                      @if($data->order->content != NULL)
                                      <div class="col-md-12 order-payment">
                                        <div class="col-md-3">
                                          <span class"td-title-1">Content</span>
                                        </div>
                                        <div class="col-md-9">
                                          <span class="td-title-2">
                                            <p style="word-wrap: break-word; text-align:justify">{{ $data->order->content }}</p>
                                          </td>
                                          </span>
                                        </div>
                                      </div>
                                      @endif
                                      @if($data->order->note != NULL)
                                      <div class="col-md-12 order-payment">
                                        <div class="col-md-3">
                                          <span class"td-title-1">Note</span>
                                        </div>
                                        <div class="col-md-9">
                                          <span class="td-title-2">
                                            <p style="word-wrap: break-word; text-align:justify">{{ $data->order->note }}</p>
                                          </td>
                                          </span>
                                        </div>
                                      </div>
                                      @endif
                                      @if($data->order->status == "on_progress")
                                      <a href="#" class="btn btn-info form-control">Sedang Dikerjakan oleh {{ $data->user->name }}</a>
                                      @else
                                      <a href="#" class="btn btn-success form-control">Closed Project</a>
                                      @endif
                                    </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                      <center> Belum ada job yang diselesaikan </center>
                    @endif

                  </div>
              </div>
          </div>
      </div>
      <!-- LOGIN SECTION END -->

  </div>

  @include('guest.includes.footer')

@endsection
