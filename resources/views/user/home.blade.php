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
            @if($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
              {{ $message }}
            </div>
            @endif
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
                            <span>{{ Auth::user()->sosmed }}</span><br><br>
                            @if(Auth::user()->verified != true)
                            <span><span class="text text-danger"></strong>Unverified Account</strong></span></span>
                            @else
                            <span><span class="text text-success"><strong>Verified Account</strong></span></span>
                            @endif
                            @if($user->discount_id != 1)
                            <span>
                              <br><br><strong>Voucher:</strong>
                              <div class="alert" style="margin-top: -7%;background-color:#cc8eec; color:white" role="alert">
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
                      Silakan periksa alamat email anda untuk melakukan verifikasi akun. Anda akan mendapatkan <a href="#" class="alert-link"> Diskon 10% </a> untuk orderan pertama setelah melakukan verifikasi.
                      Apakah anda tidak menerima email? coba periksa spam atau kirim ulang email di sini &nbsp;<a class="text text-danger" href="/confirmation/resend/email"><strong>Kirim Ulang Email</strong> </a>
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
                                      @if($data->status != "done")
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
                                      @endif
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
                                      @elseif($data->status == "done")
                                      <a class="btn btn-success form-control" href="#">Selesai Dikerjakan</a>
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
