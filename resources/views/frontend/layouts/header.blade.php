<header>
    <section class="sticky_header header_menu_col">
      <div class="header_menu">
        <div class="container-fluid">
          <a href="{{ url('/') }}" class="mobile_logo">
            <img src="{{ $setting->getSiteLogoUrl() }}" class="img-fluid" alt="{{$setting->site_title}}">
          </a>
          <div class="header_main">
            <div class="sidemenu sidemenu-1 d-lg-none d-md-block">
              <a class="open" href="javascript:void(0)"><i class="bi bi-list"></i></a>
            </div>

            <div class="main-menu">
             
              <nav id="mobile-menu" class="p-0 d-flex align-items-center navbar navbar-expand-md navbar-light">
                
                <a href="{{ url('/') }}" class="desktop_logo">
                  <img src="{{ $setting->getSiteLogoUrl() }}" class="img-fluid" alt="{{$setting->site_title}}">
                </a>
               
                  {!! navs('main-menu', 'navbar-nav', 'navbar-nav') !!}
                

                
              </nav>
            </div>
           
          </div>
        </div>
      </div>
    </section>
  </header>

  <div class="fixes">
    <div class="side-info">
      <button class="side-info-close"><i class="bi bi-x-lg"></i></button>
      <div class="side-info-content">
          <div class="mobile-menu"></div>
          
      </div>
    </div>
  </div>

  <div class="offcanvas-overlay"></div>