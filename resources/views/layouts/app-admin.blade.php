<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <meta name="description" content="Admin">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="{{URL::asset('favicon.ico')}}">

    <link rel="stylesheet" href="{{URL::asset('admins/assets/css/normalize.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admins/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admins/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admins/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admins/assets/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admins/assets/css/cs-skin-elastic.css')}}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{URL::asset('admins/assets/scss/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    @yield('head')

</head>
<body>

  @include('admin.includes.menu')

  <div id="right-panel" class="right-panel">

    @include('admin.includes.header')

    @yield('content')

  </div>

  <script src="{{URL::asset('admins/assets/js/vendor/jquery-2.1.4.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
  <script src="{{URL::asset('admins/assets/js/plugins.js')}}"></script>
  <script src="{{URL::asset('admins/assets/js/main.js')}}"></script>

  @yield('script')

</body>
</html>
