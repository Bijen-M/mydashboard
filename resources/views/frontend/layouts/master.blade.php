<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ isset($title) ? $title : 'Architects' }}</title>
  <link rel="icon" type="image/x-icon" href="{{ $setting->getSiteLogoUrl() }}">
    <link href="{{asset('frontend/fonts/bootstrapicon/font/bootstrap-icons.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('frontend/css/fonts.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('frontend/css/style.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('frontend/css/custom.css')}}" type="text/css" rel="stylesheet">
    @yield('header_resources')
  </head>
  <body>

 @include('frontend.layouts.header')

 @yield('content')

@include('frontend.layouts.common.footer')

  <div class="go-top">
    <i class="bi bi-chevron-up"></i>
  </div>

  
  <script type="text/javascript" src="{{asset('frontend/js/jquery-3.6.0.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('frontend/js/main.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('frontend/js/custom.js')}}"></script>
  @yield('footer_resources')
</body>
</html>

 