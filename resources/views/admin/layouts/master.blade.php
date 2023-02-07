<!doctype html>
<html lang="en">
  <head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->

  <link rel="stylesheet" type="text/css" href="{{asset('css/remixicon.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
  

  <title>{{ $title }}</title>
  @yield('header_resources')

  </head>
<body class="vertical-layout vertical-menu-modern navbar-sticky footer-static " data-open="click" data-menu="vertical-menu-modern">
@include('admin.layouts.common.navbar')

@include('admin.layouts.common.sidebar')
@yield('content')

<!-- Bootstrap CSS -->

@yield('footer_resources')
</body>

</html>