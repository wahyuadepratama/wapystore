<!doctype html>
<html class="no-js" lang="en">
<!--
//////////////////////////////////////////////////////

Selamat datang di WapyDesign

Website: 		http://wapydesign.com
Email: 			official@wapydesign.com
Instagram:  @wapydesign

//////////////////////////////////////////////////////
 -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>WapyDesign</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{URL::asset('guest/images/logo/icon.png')}}">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />


    <!-- Modernizr JS -->
    <script src="{{URL::asset('guest/js/vendor/modernizr-2.8.3.min.js')}}"></script>

    @yield('head')

</head>
<body class="wide-layout">

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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

  @yield('script')

</body>
</html>
