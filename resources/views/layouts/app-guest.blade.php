<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Subash || Home-2</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{URL::asset('img/icon/favicon.png')}}">

    <!-- All CSS Files -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="{{URL::asset('guest/css/bootstrap.min.css')}}">
    <!-- Nivo-slider css -->
    <link rel="stylesheet" href="{{URL::asset('guest/lib/css/nivo-slider.css')}}">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="{{URL::asset('guest/css/core.css')}}">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="{{URL::asset('guest/css/shortcode/shortcodes.css')}}">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{URL::asset('guest/style.css')}}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{URL::asset('guest/css/responsive.css')}}">
    <!-- Template color css -->
    <link href="{{URL::asset('guest/css/color/color-core.css')}}" data-style="styles" rel="stylesheet">
    <!-- User style -->
    <link rel="stylesheet" href="{{URL::asset('guest/css/custom.css')}}">

    <!-- Modernizr JS -->
    <script src="{{URL::asset('guest/js/vendor/modernizr-2.8.3.min.js')}}"></script>

    @yield('head')

</head>
<body>

  <div class="wrapper">

    @yield('content')

  </div>

  <!-- Placed JS at the end of the document so the pages load faster -->

  <!-- jquery latest version -->
  <script src="{{URL::asset('guest/js/vendor/jquery-3.1.1.min.js')}}"></script>
  <!-- Bootstrap framework js -->
  <script src="{{URL::asset('guest/js/bootstrap.min.js')}}"></script>
  <!-- jquery.nivo.slider js -->
  <script src="{{URL::asset('guest/lib/js/jquery.nivo.slider.js')}}"></script>
  <!-- All js plugins included in this file. -->
  <script src="{{URL::asset('guest/js/plugins.js')}}"></script>
  <!-- Main js file that contents all jQuery plugins activation. -->
  <script src="{{URL::asset('guest/js/main.js')}}"></script>

  @yield('script')

</body>
</html>
