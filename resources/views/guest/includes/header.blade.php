<!-- START HEADER AREA -->

@if(Request::is('shop', 'shop/*'))
  <header class="header-area header-wrapper header-2">
  <!-- header-middle-area -->
  <div id="sticky-header" class="header-middle-area plr-185">
      <div class="container-fluid">
          <div class="full-width-mega-dropdown">
              <div class="row" style="font-weight:bold">
                  <!-- logo -->
                  <div class="col-md-2 col-sm-6 col-xs-12">
                      <div class="logo">
                          <a href="/">
                              <img src="{{URL::asset('guest/images/logo/wapystore.png')}}" alt="main logo" width="120">
                          </a>
                      </div>
                  </div>
                  <!-- primary-menu -->
                  <div class="col-md-8 hidden-sm hidden-xs">
                      <nav id="primary-menu">
                          <ul class="main-menu text-center">
                              <li>
                                <a href="/shop">Home</a>
                              </li>
                              <li><a href="#">Fashion Pria</a>
                                <ul class="dropdwn">
                                  @php $pria = \App\Models\CategoryStock::where('name', 'LIKE', '%'.'Pria'.'%')->get(); @endphp
                                  @foreach($pria as $data1)
                                  <li>
                                      <a href="/shop/category/{{ $data1->name }}">{{ $data1->name }} (@php echo count(\App\Models\Stock::where('id_category', $data1->id)->get()) @endphp)</a>
                                  </li>
                                  @endforeach
                                </ul>
                              </li>
                              <li><a href="#">Fashion Wanita</a>
                                <ul class="dropdwn">
                                  @php $wanita = \App\Models\CategoryStock::where('name', 'LIKE', '%'.'Wanita'.'%')->get(); @endphp
                                  @foreach($wanita as $data2)
                                  <li>
                                      <a href="/shop/category/{{ $data2->name }}">{{ $data2->name }} (@php echo count(\App\Models\Stock::where('id_category', $data2->id)->get()) @endphp)</a>
                                  </li>
                                  @endforeach
                                </ul>
                              </li>
                              <li><a href="#">Fashion Anak</a>
                                <ul class="dropdwn">
                                  @php $anak = \App\Models\CategoryStock::where('name', 'LIKE', '%'.'Fashion'.'%')->get(); @endphp
                                  @foreach($anak as $data3)
                                  <li>
                                      <a href="/shop/category/{{ $data3->name }}">{{ $data3->name }} (@php echo count(\App\Models\Stock::where('id_category', $data3->id)->get()) @endphp)</a>
                                  </li>
                                  @endforeach
                                </ul>
                              </li>
                          </ul>
                      </nav>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </header>

  <div class="mobile-menu-area hidden-lg hidden-md">
      <div class="container">
          <div class="row">
              <div class="col-xs-12">
                  <div class="mobile-menu">
                      <nav id="dropdown">
                          <ul>
                              <li>
                                <a href="/shop">Home</a>
                              </li>
                              <li><a href="#">Fashion Pria</a>
                                <ul>
                                  @php $pria1 = \App\Models\CategoryStock::where('name', 'LIKE', '%'.'Pria'.'%')->get(); @endphp
                                  @foreach($pria1 as $data11)
                                  <li>
                                      <a href="/shop/category/{{ $data11->name }}">{{ $data11->name }} (@php echo count(\App\Models\Stock::where('id_category', $data11->id)->get()) @endphp)</a>
                                  </li>
                                  @endforeach
                                </ul>
                              </li>
                              <li><a href="#">Fashion Wanita</a>
                                <ul>
                                  @php $wanita = \App\Models\CategoryStock::where('name', 'LIKE', '%'.'Wanita'.'%')->get(); @endphp
                                  @foreach($wanita as $data21)
                                  <li>
                                      <a href="/shop/category/{{ $data21->name }}">{{ $data21->name }} (@php echo count(\App\Models\Stock::where('id_category', $data21->id)->get()) @endphp)</a>
                                  </li>
                                  @endforeach
                                </ul>
                              </li>
                              <li><a href="#">Fashion Anak</a>
                                <ul>
                                  @php $anak = \App\Models\CategoryStock::where('name', 'LIKE', '%'.'Fashion'.'%')->get(); @endphp
                                  @foreach($anak as $data31)
                                  <li>
                                      <a href="/shop/category/{{ $data31->name }}">{{ $data31->name }} (@php echo count(\App\Models\Stock::where('id_category', $data31->id)->get()) @endphp)</a>
                                  </li>
                                  @endforeach
                                </ul>
                              </li>
                          </ul>
                      </nav>
                  </div>
              </div>
          </div>
      </div>
  </div>

  @else
    <header class="header-area header-wrapper header-2">
        <!-- header-middle-area -->
        <div id="sticky-header" class="header-middle-area plr-185">
            <div class="container-fluid">
                <div class="full-width-mega-dropdown">
                    <div class="row">
                        <!-- logo -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="logo">
                                <a href="/">
                                    <img src="{{URL::asset('guest/images/logo/wapystore.png')}}" alt="main logo" width="120">
                                </a>
                            </div>
                        </div>
                        <!-- primary-menu -->
                        <div class="col-md-6 hidden-sm hidden-xs">
                            <nav id="primary-menu" style="font-weight: bold;">
                                <ul class="main-menu text-center">
                                    <li>
                                      <a href="/">Home</a>
                                    </li>
                                    <li class="mega-parent"><a href="#">Theme</a>
                                        <div class="mega-menu-area mega-menu-area-2 clearfix">
                                            <div class="mega-menu-link mega-menu-link-2  f-left">
                                                <ul class="single-mega-item">
                                                  <li>
                                                      <a href="/theme">All Theme</a>
                                                  </li>
                                                  @php $five = \App\Models\Theme::all(); $batas = 15;@endphp
                                                  @foreach($five as $data1)
                                                    @if($batas > 9)
                                                    <li>
                                                        <a href="/theme/{{ $data1->id }}">{{ $data1->name }}</a>
                                                    </li>
                                                    @endif
                                                    @php $batas--; @endphp
                                                  @endforeach
                                                </ul>
                                                <ul class="single-mega-item">
                                                  @php $batas = 15;@endphp
                                                  @foreach($five as $data2)
                                                    @if($batas > 0 && $batas <= 9)
                                                    <li>
                                                        <a href="/theme/{{ $data2->id }}">{{ $data2->name }}</a>
                                                    </li>
                                                    @endif
                                                    @php $batas--; @endphp
                                                  @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                      <a href="/design">Designs</a>
                                    </li>
                                    <li>
                                        <a href="/contact">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- END HEADER AREA -->


    <!-- START MOBILE MENU AREA -->
    <div class="mobile-menu-area hidden-lg hidden-md">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul>
                                <li>
                                  <a href="/">Home</a>
                                </li>
                                <li><a href="#">Theme</a>
                                  <ul>
                                    <li>
                                        <a href="/theme">All Theme</a>
                                    </li>
                                    @php $five = \App\Models\Theme::all(); @endphp
                                    @foreach($five as $data2)
                                    <li>
                                        <a href="/theme/{{ $data1->id }}">{{ $data2->name }}</a>
                                    </li>
                                    @endforeach
                                  </ul>
                                </li>
                                <li>
                                  <a href="/design">Designs</a>
                                </li>
                                <li>
                                    <a href="/contact">Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
