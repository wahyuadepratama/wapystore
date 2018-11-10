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
                          <h1 class="breadcrumbs-title">Customer</h1>
                          <ul class="breadcrumb-list">
                              <li><a href="/">Home</a></li>
                              <li>Customer</li>
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
                          <center>Customer Information</center>
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
                            <span>{{ Auth::user()->sosmed }}</span><br>
                            @if(Auth::user()->verified != true)
                            <span><span class="text text-danger"></strong>Unverified Account</strong></span></span>
                            @else
                            <span><span class="text text-success"><strong>Verified Account</strong></span></span>
                            @endif
                            @if($user->discount_id != 1)
                            <span>
                              <div class="alert" style="background-color:#cc8eec; color:white"  role="alert">
                                {{ $user->discount->name }}
                              </div>
                            </span>
                            @endif
                          </p>
                        </div>
                      </div>
                    </div>

                  </div>
                  <!-- new-customers -->
                  <div class="col-md-9">
                    @if(Auth::user()->verified != true)
                    <div class="alert alert-warning" role="alert">
                      Please check your email address for account verification. You will get <a href="#" class="alert-link">10% Discount</a> on all types of design orders.
                    </div>
                    @endif
                    <!-- My Order info -->
                    @if(!$orderan->isEmpty())
                    @foreach($orderan as $data)
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
                                          <span class"td-title-1">Order Date</span>
                                        </div>
                                        <div class="col-md-9">
                                          <p class="td-title-2">{{ $data->updated_at }}</p>
                                        </div>
                                      </div>
                                      <div class="col-md-12 order-payment">
                                        <div class="col-md-3">
                                          <span class"td-title-1">Product Name</span>
                                        </div>
                                        <div class="col-md-9">
                                          <p class="td-title-2">{{ $data->name }}</p>
                                        </div>
                                      </div>
                                      <div class="col-md-12 order-payment">
                                        <div class="col-md-3">
                                          <span class"td-title-1">Price</span>
                                        </div>
                                        <div class="col-md-9">
                                          <p class="td-title-2">Rp {{number_format(($data->price),0,',','.')}} ,-</p>
                                        </div>
                                      </div>
                                      @if($data->discount_status != NULL)
                                      <div class="col-md-12 order-payment">
                                        <div class="col-md-3">
                                          <span class"td-title-1">Discount</span>
                                        </div>
                                        <div class="col-md-9">
                                          <p class="td-title-2">{{ $data->discount_status }}</p>
                                        </div>
                                      </div>
                                      @endif
                                      <div class="col-md-12 order-payment">
                                        <div class="col-md-3">
                                          <span class"td-title-1">Theme</span>
                                        </div>
                                        <div class="col-md-9">
                                          <p class="td-title-2">{{ $data->theme }}</p>
                                        </div>
                                      </div>
                                      @if($data->revision != NULL)
                                      <div class="col-md-12 order-payment">
                                        <div class="col-md-4">
                                          <span class"td-title-1">Opportunities for Revision</span>
                                        </div>
                                        <div class="col-md-8">
                                          <p class="td-title-2">{{ $data->revision }}</p>
                                        </div>
                                      </div>
                                      @endif
                                      <div class="col-md-12 order-payment">
                                        <div class="col-md-3">
                                          <span class"td-title-1">Status</span>
                                        </div>
                                        <div class="col-md-9">
                                          <p class="td-title-2">
                                            @if($data->status == "waiting")
                                              Sedang Menuggu Konfirmasi Designer
                                            @endif
                                            @if($data->status == "on_progress")
                                              Sedang Dalam Pengerjaan
                                            @endif
                                            @if($data->status == "revision")
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
                                          <p class="td-title-2">{{ $data->size_long }} x {{ $data->size_wide }} (cm)</p>
                                        </div>
                                      </div>
                                      @endif
                                      @if($data->content != NULL)
                                      <div class="col-md-12 order-payment">
                                        <div class="col-md-3">
                                          <span class"td-title-1">Content</span>
                                        </div>
                                        <div class="col-md-9">
                                          <span class="td-title-2">
                                            <p style="word-wrap: break-word; text-align:justify">{{ $data->content }}</p>
                                          </td>
                                          </span>
                                        </div>
                                      </div>
                                      @endif
                                      @if($data->note != NULL)
                                      <div class="col-md-12 order-payment">
                                        <div class="col-md-3">
                                          <span class"td-title-1">Note</span>
                                        </div>
                                        <div class="col-md-9">
                                          <span class="td-title-2">
                                            <p style="word-wrap: break-word; text-align:justify">{{ $data->note }}</p>
                                          </td>
                                          </span>
                                        </div>
                                      </div>
                                      @endif
                                      @if($data->status == "waiting")
                                      <a class="btn btn-danger form-control" href="/order/destroy/@php echo md5($data->id) @endphp" onclick="return confirm('Are you sure you want to cancel this order? If you have a discount, it wont return.');">Cancel Order</a>
                                      @else
                                      <a href="#" class="btn btn-info form-control">Sedang Dalam Pengerjaan</a>
                                      @endif
                                    </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                      <center> Anda belum melakukan orderan </center>
                    @endif

                  </div>
              </div>
          </div>
      </div>
      <!-- LOGIN SECTION END -->

  </div>

  @include('guest.includes.footer')

@endsection
