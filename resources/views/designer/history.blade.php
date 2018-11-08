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
                          <h1 class="breadcrumbs-title">Transactions History</h1>
                          <ul class="breadcrumb-list">
                              <li><a href="/">Home</a></li>
                              <li>Transactions History</li>
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
                  <!-- new-Designers -->
                  <div class="col-md-12">
                    <!-- My Order info -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title alert alert-primary">
                              <a  href="#My_order_info"><strong class="text-warning">Transactions History</strong></a>
                          </h4>
                        </div>
                        <div id="My_order_info" role="tabpanel" >
                            <div class="panel-body">
                              <!-- our order -->
                              @foreach($mutation as $data)
                              <div class="payment-details">
                                <div class="col-md-12 order-payment">
                                  <div class="col-md-2">
                                    <span class"td-title-1">
                                      @if($data->kredit == NULL)
                                        <strong>{{ "DEBIT" }}</strong>
                                      @else
                                        <strong>{{ "KREDIT" }}</strong>
                                      @endif
                                    </span>
                                  </div>
                                  <div class="col-md-6">
                                    <span class"td-title-1">
                                      {{ $data->keterangan }}
                                    </span>
                                  </div>
                                  <div class="col-md-4">
                                    <p class="td-title-2">
                                      @if($data->kredit == NULL)
                                        Rp {{number_format(($data->debit),0,',','.')}} ,-
                                      @else
                                        Rp {{number_format(($data->kredit),0,',','.')}} ,-
                                      @endif
                                    </p>
                                  </div>
                                </div>
                              </div>
                              @endforeach
                            </div>
                        </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- LOGIN SECTION END -->

  </div>

  @include('guest.includes.footer')

@endsection
