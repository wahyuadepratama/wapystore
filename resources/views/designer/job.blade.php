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
                          <h1 class="breadcrumbs-title">Login / Register</h1>
                          <ul class="breadcrumb-list">
                              <li><a href="index.html">Home</a></li>
                              <li>Login / Register</li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- BREADCRUMBS SETCTION END -->

  <div id="page-content" class="page-wrapper">

      <!-- LOGIN SECTION START -->
      <div class="login-section mb-80">
          <div class="container">
              <div class="row">
                  <div class="col-md-3">

                    @include('designer/includes/job-menu')

                  </div>
                  <!-- new-customers -->
                  <div class="col-md-9">
                    <!-- My Order info -->
                    @if(!$orderan->isEmpty())
                    @foreach($orderan as $data)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          @if($data->status == "waiting")
                            <h4 class="panel-title alert alert-success">
                                <a  href="#My_order_info"><strong class="text-success">Open #{{ $data->id }}</strong></a>
                            </h4>
                          @else
                            <h4 class="panel-title alert alert-danger">
                                <a  href="#My_order_info"><strong class="text-danger">Already Taken #{{ $data->id }}</strong></a>
                            </h4>
                          @endif
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
                                        <div class="col-md-3">
                                          <span class"td-title-1">Opportunities for revision</span>
                                        </div>
                                        <div class="col-md-9">
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
                                      <div class="col-md-12 order-payment">
                                        <div class="col-md-3">
                                          <span class"td-title-1">Ukuran (p x l)</span>
                                        </div>
                                        <div class="col-md-9">
                                          <p class="td-title-2">{{ $data->size_long }} x {{ $data->size_wide }} (cm)</p>
                                        </div>
                                      </div>
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
                                          <a class="btn btn-success form-control" href="/job/take/{{ $data->id }}" onclick="return confirm('Are you sure you want to take this job ?');">Take This Job</a>
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
