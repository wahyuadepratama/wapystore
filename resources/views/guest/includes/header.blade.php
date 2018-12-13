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
                                  @php $pria = \App\Models\CategoryStock::where('name', 'LIKE', '%'.'Wanita'.'%')->get(); @endphp
                                  @foreach($pria as $data2)
                                  <li>
                                      <a href="/shop/category/{{ $data2->name }}">{{ $data2->name }} (@php echo count(\App\Models\Stock::where('id_category', $data2->id)->get()) @endphp)</a>
                                  </li>
                                  @endforeach
                                </ul>
                              </li>
                              <li><a href="#">Fashion Anak</a>
                                <ul class="dropdwn">
                                  @php $pria = \App\Models\CategoryStock::where('name', 'LIKE', '%'.'Fashion'.'%')->get(); @endphp
                                  @foreach($pria as $data3)
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
  @else
    <header class="header-area header-wrapper header-2">
        <!-- header-middle-area -->
        <div id="sticky-header" class="header-middle-area plr-185">
            <div class="container-fluid">
                <div class="full-width-mega-dropdown">
                    <div class="row">
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
                                      <a href="/">Home</a>
                                    </li>
                                    @if(Auth::user())
                                      @if(Auth::user()->role_id == 3)
                                      <li class="mega-parent"><a href="#">Order</a>
                                          <div class="mega-menu-area mega-menu-area-2 clearfix">
                                              <div class="mega-menu-link mega-menu-link-2  f-left">
                                                  <ul class="single-mega-item">
                                                    <li>
                                                        <a href="/order/spanduk">Spanduk</a>
                                                    </li>
                                                    <li>
                                                        <a href="/order/poster">Poster</a>
                                                    </li>
                                                    <li>
                                                        <a href="/order/banner">Banner</a>
                                                    </li>
                                                    <li>
                                                        <a href="/order/pamflet">Pamflet</a>
                                                    </li>
                                                    <li>
                                                        <a href="/order/id-card">ID Card</a>
                                                    </li>
                                                    <li>
                                                        <a href="/order/book-cover">Book Cover</a>
                                                    </li>
                                                  </ul>
                                                  <ul class="single-mega-item">
                                                    <li>
                                                        <a href="/order/logo">Logo</a>
                                                    </li>
                                                    <li>
                                                        <a href="/order/cv">CV</a>
                                                    </li>
                                                    <li>
                                                      <a href="/order/calender">Calender</a>
                                                    </li>
                                                    <li>
                                                      <a href="/order/maskot">Maskot</a>
                                                    </li>
                                                    <li>
                                                      <a href="/order/vector">Vector Art</a>
                                                    </li>

                                                  </ul>
                                              </div>
                                          </div>
                                      </li>
                                      @endif
                                      @if(Auth::user()->role_id == 2)
                                      <li>
                                        <a href="/job">Take a Job</a>
                                      </li>
                                      @endif
                                    @else
                                    <li class="mega-parent"><a href="#">Order</a>
                                        <div class="mega-menu-area mega-menu-area-2 clearfix">
                                            <div class="mega-menu-link mega-menu-link-2  f-left">
                                              <ul class="single-mega-item">
                                                <li>
                                                    <a href="/order/spanduk">Spanduk</a>
                                                </li>
                                                <li>
                                                    <a href="/order/poster">Poster</a>
                                                </li>
                                                <li>
                                                    <a href="/order/banner">Banner</a>
                                                </li>
                                                <li>
                                                    <a href="/order/pamflet">Pamflet</a>
                                                </li>
                                                <li>
                                                    <a href="/order/id-card">ID Card</a>
                                                </li>
                                                <li>
                                                    <a href="/order/book-cover">Book Cover</a>
                                                </li>
                                              </ul>
                                              <ul class="single-mega-item">
                                                <li>
                                                    <a href="/order/logo">Logo</a>
                                                </li>
                                                <li>
                                                    <a href="/order/cv">CV</a>
                                                </li>
                                                <li>
                                                  <a href="/order/calender">Calender</a>
                                                </li>
                                                <li>
                                                  <a href="/order/maskot">Maskot</a>
                                                </li>
                                                <li>
                                                  <a href="/order/vector">Vector Art</a>
                                                </li>

                                              </ul>
                                            </div>
                                        </div>
                                    </li>
                                    @endif
                                    <li class="mega-parent"><a href="#">Design Theme</a>
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
                                      <a href="/portofolio">Portofolio</a>
                                    </li>
                                    <li>
                                        <a href="/contact">Contact</a>
                                    </li>
                                    @if(Auth::user())
                                    <li><a href="/home">{{ Auth::user()->name }}</a>
                                      <ul class="dropdwn">
                                          <li>
                                              <a href="/home">Profile</a>
                                          </li>
                                          <li>
                                            <a href="/home/change-password">Ubah Password</a>
                                          </li>
                                          <li>
                                            <a href="{{ route('logout') }}"
                                                  onclick="event.preventDefault();
                                                           document.getElementById('logout-form').submit();">
                                                  Logout
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                          </li>
                                      </ul>
                                    </li>
                                    @else
                                    <li>
                                      <a href="/login">Login</a>
                                    </li>
                                    @endif
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
                                @if(Auth::user())
                                  @if(Auth::user()->role_id == 3)
                                  <li><a href="#">Order</a>
                                    <ul>
                                        <li>
                                            <a href="/order/spanduk">Spanduk</a>
                                        </li>
                                        <li>
                                            <a href="/order/poster">Poster</a>
                                        </li>
                                        <li>
                                            <a href="/order/banner">Banner</a>
                                        </li>
                                        <li>
                                            <a href="/order/id-card">ID Card</a>
                                        </li>
                                        <li>
                                            <a href="/order/logo">Logo</a>
                                        </li>
                                        <li>
                                            <a href="/order/cv">CV</a>
                                        </li>
                                        <li>
                                            <a href="/order/pamflet">Pamflet</a>
                                        </li>
                                        <li>
                                            <a href="/order/book-cover">Book Cover</a>
                                        </li>
                                    </ul>
                                  </li>
                                  @endif
                                  @if(Auth::user()->role_id == 2)
                                  <li>
                                    <a href="/job">Take a Job</a>
                                  </li>
                                  @endif
                                @else
                                  <li><a href="#">Order</a>
                                    <ul>
                                        <li>
                                            <a href="/order/spanduk">Spanduk</a>
                                        </li>
                                        <li>
                                            <a href="/order/poster">Poster</a>
                                        </li>
                                        <li>
                                            <a href="/order/banner">Banner</a>
                                        </li>
                                        <li>
                                            <a href="/order/id-card">ID Card</a>
                                        </li>
                                        <li>
                                            <a href="/order/logo">Logo</a>
                                        </li>
                                        <li>
                                            <a href="/order/cv">CV</a>
                                        </li>
                                        <li>
                                            <a href="/order/pamflet">Pamflet</a>
                                        </li>
                                        <li>
                                            <a href="/order/book-cover">Book Cover</a>
                                        </li>
                                        <li>
                                          <a href="/order/calender">Calender</a>
                                        </li>
                                        <li>
                                          <a href="/order/maskot">Maskot</a>
                                        </li>
                                        <li>
                                          <a href="/order/vector">Vector Art</a>
                                        </li>
                                    </ul>
                                  </li>
                                @endif
                                <li><a href="#">Design Theme</a>
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
                                  <a href="/portofolio">Portofolio</a>
                                </li>
                                <li>
                                    <a href="/contact">Contact</a>
                                </li>
                                @if(Auth::user())
                                  <li><a href="/home">{{ Auth::user()->name }}</a>
                                    <ul>
                                        <li>
                                            <a href="/home">Profile</a>
                                        </li>
                                        <li>
                                          <a href="/home/change-password">Ubah Password</a>
                                        </li>
                                        <li>
                                          <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                Logout
                                          </a>
                                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                              {{ csrf_field() }}
                                          </form>
                                        </li>
                                    </ul>
                                  </li>
                                @else
                                <li>
                                  <a href="/login">Login</a>
                                </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
