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
                          <h1 class="breadcrumbs-title">Designer</h1>
                          <ul class="breadcrumb-list">
                              <li><a href="/">Home</a></li>
                              <li>Designer</li>
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
                              <strong style="font-size:15px">
                                @php
                                  $debit = \App\Models\HistoryTransaction::where('user_id',Auth::user()->id)->sum('debit');
                                  $kredit = \App\Models\HistoryTransaction::where('user_id',Auth::user()->id)->sum('kredit');
                                  $saldo = $debit + $kredit;
                                @endphp
                                IDR Rp {{number_format(($saldo),0,',','.')}} ,-
                              <strong>
                            </span><br><br>
                            <span>
                              <a href="/home/history" style="border-radius: 5%" class="btn btn-info"><strong>History Transaction</strong></a>
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
                          @if($data->order->status == "on_progress")
                          <h4 class="panel-title alert alert-danger">
                              <a  href="#My_order_info"><strong class="text-danger">No. Orderan #{{ $data->order->id }} Sedang Kamu Kerjakan</strong></a>
                          </h4>
                          @else
                          <h4 class="panel-title alert alert-info">
                              <a  href="#My_order_info"><strong class="text-info">No. Orderan #{{ $data->order->id }} Selesai Dikerjakan</strong></a>
                          </h4>
                          @endif
                        </div>
                        <div id="My_order_info" role="tabpanel" >
                            <div class="panel-body">
                                    <!-- our order -->
                                    <div class="payment-details">
                                      <div class="col-md-12 order-payment">
                                        <div class="col-md-3">
                                          <span class"td-title-1">Order Date</span>
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
                                          <p class="td-title-2">Rp {{number_format(($data->order->price),0,',','.')}} ,-</p>
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
                                        <div class="col-md-4">
                                          <span class"td-title-1">Opportunities for Revision</span>
                                        </div>
                                        <div class="col-md-8">
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
                                      @if($data->size_long != NULL | $data->size_wide != NULL)
                                      <div class="col-md-12 order-payment">
                                        <div class="col-md-3">
                                          <span class"td-title-1">Size</span>
                                        </div>
                                        <div class="col-md-9">
                                          <p class="td-title-2">{{ $data->order->size_long }} x {{ $data->order->size_wide }} (cm)</p>
                                        </div>
                                      </div>
                                      @endif
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
                                      @if($data->order->file != NULL)
                                      <div class="col-md-12 order-payment">
                                        <div class="col-md-3">
                                          <span class"td-title-1">File, Logo, Etc</span>
                                        </div>
                                        <div class="col-md-9">
                                          <span class="td-title-2">
                                            <form method="get" action="/storage/orderan/{{ $data->order->file }}">
                                               <button type="submit" class="btn btn-info">Download!</button>
                                            </form>
                                          </td>
                                          </span>
                                        </div>
                                      </div>
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
