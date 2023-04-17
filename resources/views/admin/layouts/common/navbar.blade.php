<div class="header-navbar-shadow"></div>
    <nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top">
      <div class="navbar-wrapper">
        <div class="navbar-container content">
          <div class="navbar-collapse" id="navbar-mobile">

            <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
              <ul class="nav navbar-nav">
                <li class="nav-item mobile-menu d-xl-none mr-auto">
                  <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                    <i class="ri-menu-3-line"></i>
                  </a>
                </li>
              </ul>
  
            </div>

            <ul class="nav navbar-nav float-right">
              <li class="dropdown dropdown-user nav-item">
                <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                  <div class="user-nav d-sm-flex d-none">
                    <span class="user-name">{{auth()->user()->name}}</span>
                  </div>
                  {{-- <span>
                    <img class="rounded-circle" src="images/avatar-s-11.jpg" alt="avatar" height="40" width="40">
                  </span> --}}
                </a>
                  <div class="dropdown-menu dropdown-menu-right pb-0">
                    <a class="dropdown-item" href="{{ route('users.edit', auth()->user())}}"><i class="ri-user-3-line"></i> Edit Profile</a>
                    <div class="dropdown-divider mb-0"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="ri-logout-circle-r-line mr-50"></i> Logout</a>

                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </li>
            </ul>

          </div>
        </div>
      </div>
    </nav>