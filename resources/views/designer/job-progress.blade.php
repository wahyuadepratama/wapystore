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
                          <h1 class="breadcrumbs-title">Job</h1>
                          <ul class="breadcrumb-list">
                              <li><a href="/">Home</a></li>
                              <li>Job</li>
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

                    @if($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                      {{ $message }}
                    </div>
                    @endif

                    <!-- My Order info -->
                    @if(!$orderan->isEmpty())
                    @foreach($orderan as $data)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          @if($data->order->status == "on_progress")
                          <h4 class="panel-title alert alert-danger">
                              <a  href="#My_order_info"><strong class="text-danger">#{{ $data->id }} Already Taken By {{ $data->user->name }}</strong></a>
                          </h4>
                          @endif
                          @if($data->order->status == "revision")
                          <h4 class="panel-title alert alert-danger">
                              <a  href="#My_order_info"><strong class="text-danger">#{{ $data->id }} Is Being Revised By {{ $data->user->name }}</strong></a>
                          </h4>
                          @endif
                          @if($data->order->status == "done")
                          <h4 class="panel-title alert alert-info">
                              <a  href="#My_order_info"><strong class="text-info">#{{ $data->id }} Order Closed</strong></a>
                          </h4>
                          @endif
                        </div>
                        <div id="My_order_info" role="tabpanel" >
                            <div class="panel-body">
                                    <!-- our order -->
                                    <div class="payment-details">
                                      <div class="col-md-12 order-payment">
                                        <div class="col-md-3">
                                          <span class"td-title-1">Working Date</span>
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
                                      @if($data->discount_status != NULL)
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
                                      @if($data->revision != NULL)
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
                                            @if($data->order->status == "on_progress")
                                              Sedang Dalam Pengerjaan
                                            @endif
                                            @if($data->order->status == "revision")
                                              Sedang Dalam Proses Revisi
                                            @endif
                                            @if($data->order->status == "done")
                                              Selesai Dikerjakan
                                            @endif
                                          </p>
                                        </div>
                                      </div>
                                      <div class="col-md-12 order-payment">
                                        <div class="col-md-3">
                                          <span class"td-title-1">Size (p x l)</span>
                                        </div>
                                        <div class="col-md-9">
                                          <p class="td-title-2">{{ $data->order->size_long }} x {{ $data->order->size_wide }} (cm)</p>
                                        </div>
                                      </div>
                                      @if($data->content != NULL)
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
                                      @if($data->note != NULL)
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
                                      @if($data->file != NULL)
                                      <div class="col-md-12 order-payment">
                                        <div class="col-md-3">
                                          <span class"td-title-1">File, Logo, Etc</span>
                                        </div>
                                        <div class="col-md-9">
                                          <span class="td-title-2">
                                            <form method="get" action="/storage/orderan/{{ $data->file }}">
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
                      <center> Belum ada order dengan status ini </center>
                    @endif

                    {{ $orderan->links() }}

                  </div>
              </div>
          </div>
      </div>
      <!-- LOGIN SECTION END -->

  </div>

  @include('guest.includes.footer')

@endsection
