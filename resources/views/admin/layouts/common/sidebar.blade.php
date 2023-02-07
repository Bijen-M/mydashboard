<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
      <ul class="nav navbar-nav flex-row">
        <li class="nav-item mr-auto"><a class="navbar-brand" href="index.html">
            <div class="brand-logo"><img class="logo" src="images/logo.png"/></div>
            <h2 class="brand-text mb-0">{{ auth()->user()->name }}</h2></a></li>
        <li class="nav-item nav-toggle">
          <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
            <i class="d-block d-xl-none font-medium-4  ri-menu-3-line primary toggle-icon"></i>
            <i class="toggle-icon ri-menu-3-line font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="ri-menu-3-line"></i>
          </a>
        </li>
      </ul>
    </div>

    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="">

        <li class="navigation-header"><span>Table</span></li>

        <li class="navigation-header"><span>Menu</span></li>
       
        <li class=" nav-item">
          <a href="#">
            <i class="ri-menu-3-line"></i>
            <span class="menu-title">Menu Levels</span>
          </a>
          <ul class="menu-content">
            <li>
              <a href="#">
                <i class=" "></i>
                <span class="menu-item">Second Level</span>
              </a>
            </li>
            <li>
              <a href="#"><i class=" "></i>
                <span class="menu-item">Second Level</span>
              </a>
              <ul class="menu-content">
                <li>
                  <a href="#">
                    <i class=" "></i>
                    <span class="menu-item">Third Level</span>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <i class=" "></i>
                    <span class="menu-item">Third Level</span>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </li>

      </ul>
    </div>
  </div>