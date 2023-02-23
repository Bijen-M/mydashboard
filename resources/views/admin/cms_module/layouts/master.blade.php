<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" type="text/css" href="{{ asset('css/remixicon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">


    <title>{{ isset($title) ? $title : 'Architects' }}</title>
    @yield('header_resources')

</head>

<body class="vertical-layout vertical-menu-modern navbar-sticky footer-static " data-open="click"
    data-menu="vertical-menu-modern">
    @include('admin.layouts.common.navbar')

    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="index.html">
                        <div class="brand-logo"><img class="logo" src="images/logo.png" /></div>
                        <h2 class="brand-text mb-0">{{ auth()->user()->name }}</h2>
                    </a></li>
                <li class="nav-item nav-toggle">
                    <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                        <i class="d-block d-xl-none font-medium-4  ri-menu-3-line primary toggle-icon"></i>
                        <i class="toggle-icon ri-menu-3-line font-medium-4 d-none d-xl-block collapse-toggle-icon primary"
                            data-ticon="ri-menu-3-line"></i>
                    </a>
                </li>
            </ul>
        </div>
        @php
            $sidebar = isset($sidebar) ? $sidebar : 'sidebar';
        @endphp
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation"
                data-icon-style="">
                @include('admin.cms_module.layouts.common.' . $sidebar)

            </ul>
        </div>
    </div>


    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">

            @include('admin.layouts.common.breadcrumbs')
              @if (Session::has('success_message'))
                  <div class="alert alert-success alert-dismissible fade show">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                      {{ Session::get('success_message') }}
                  </div>
              @endif
              @if (Session::has('error_message'))
                  <div class="alert alert-danger alert-dismissible fade show">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                      </button>
                      {{ Session::get('error_message') }}
                  </div>
              @endif
            @yield('content')
        </div>
    </div>


    <!-- Bootstrap CSS -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/main.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/vertical-menu/vertical-menu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    @yield('footer_resources')
</body>

</html>
