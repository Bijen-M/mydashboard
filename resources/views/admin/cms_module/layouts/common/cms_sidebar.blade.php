<?php
$menu = isset($menu) ? $menu : '';
$submenu = isset($submenu) ? $submenu : '';
?>

<li class="navigation-header"><span>CMS</span></li>

<li  class="{{($menu=='menu' ? 'active':'')}}">
  <a href="{{route('menus.index')}}">
    <i class="ri-menu-line"></i>
    <span class="menu-item">Menu</span>
  </a>
</li>
<li class="nav-item {{($menu=='banner'?'has-sub sidebar-group-active open':'')}}">
  <a href="{{ route('banners.index')}}">
    <i class="ri-image-line"></i>
    <span class="menu-title">Banners</span>
  </a>
  <ul class="menu-content">
    <li class="{{($menu=='banner' && $submenu=='index'? 'active':'')}}">
      <a href="{{ route('banners.index')}}">
        <i class="ri-file-list-line"></i>
        <span class="menu-item">All Banners</span>
      </a>
    </li>
    <li  class="{{($menu=='banner' && $submenu=='create' ? 'active':'')}}">
      <a href="{{route('banners.create')}}">
        <i class="ri-add-line"></i>
        <span class="menu-item">Create New Banner</span>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item {{($menu=='about-us'?'has-sub sidebar-group-active open':'')}}">
  <a href="{{ route('about-us.index')}}">
    <i class="ri-file-info-line"></i>
    <span class="menu-title">About Us</span>
  </a>
  <ul class="menu-content">
    <li class="{{($menu=='about-us' && $submenu=='index'? 'active':'')}}">
      <a href="{{ route('about-us.index')}}">
        <i class="ri-file-list-line"></i>
        <span class="menu-item">About Us headings</span>
      </a>
    </li>
    <li  class="{{($menu=='about-us' && $submenu=='create' ? 'active':'')}}">
      <a href="{{route('about-us.create')}}">
        <i class="ri-add-line"></i>
        <span class="menu-item">Create About Us headings</span>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item {{($menu=='services'?'has-sub sidebar-group-active open':'')}}">
  <a href="{{ route('services.index')}}">
    <i class="ri-service-line"></i>
    <span class="menu-title">Services</span>
  </a>
  <ul class="menu-content">
    <li class="{{($menu=='services' && $submenu=='index'? 'active':'')}}">
      <a href="{{ route('services.index')}}">
        <i class="ri-file-list-line"></i>
        <span class="menu-item">All Services</span>
      </a>
    </li>
    <li  class="{{($menu=='services' && $submenu=='create' ? 'active':'')}}">
      <a href="{{route('services.create')}}">
        <i class="ri-add-line"></i>
        <span class="menu-item">Create New Service</span>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item {{($menu=='projects'?'has-sub sidebar-group-active open':'')}}">
  <a href="#">
    <i class="ri-briefcase-line"></i>
    <span class="menu-title">Projects</span>
  </a>
  <ul class="menu-content">
    <li class="nav-item {{($menu=='projects'?'has-sub sidebar-group-active open':'')}}">
      <a href="{{ route('services.index')}}">
        <i class="ri-briefcase-line"></i>
        <span class="menu-title">Projects</span>
      </a>
      <ul class="menu-content">
        <li class="{{($menu=='projects' && $submenu=='index'? 'active':'')}}">
          <a href="{{ route('projects.index')}}">
            <i class="ri-file-list-line"></i>
            <span class="menu-item">All projects</span>
          </a>
        </li>
        <li  class="{{($menu=='projects' && $submenu=='create' ? 'active':'')}}">
          <a href="{{route('projects.create')}}">
            <i class="ri-add-line"></i>
            <span class="menu-item">Create New Project</span>
          </a>
        </li>
      </ul>
    </li>
  </ul>
  <ul class="menu-content">
  <li class="nav-item {{($menu=='projecttype'?'has-sub sidebar-group-active open':'')}}">
    <a href="{{ route('project.type.index')}}">
      <i class="ri-briefcase-line"></i>
      <span class="menu-title">Project Types</span>
    </a>
    <ul class="menu-content">
      <li class="{{($menu=='projecttype' && $submenu=='index'? 'active':'')}}">
        <a href="{{ route('project.type.index')}}">
          <i class="ri-file-list-line"></i>
          <span class="menu-item">All Project Types</span>
        </a>
      </li>
      <li  class="{{($menu=='projecttype' && $submenu=='create' ? 'active':'')}}">
        <a href="{{route('project.type.create')}}">
          <i class="ri-add-line"></i>
          <span class="menu-item">Create Project Type</span>
        </a>
      </li>
    </ul>
  </li>
  </ul>
</li>
<li class="nav-item {{($menu=='contactus'?'has-sub sidebar-group-active open':'')}}">
  <a href="{{ route('contactus.index')}}">
    <i class="ri-contacts-book-line"></i>
    <span class="menu-title">Contact Us</span>
  </a>
  <ul class="menu-content">
    <li class="{{($menu=='contactus' && $submenu=='index'? 'active':'')}}">
      <a href="{{ route('contactus.index')}}">
        <i class="ri-file-list-line"></i>
        <span class="menu-item">All Contacts</span>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item {{($menu=='vacancy'?'has-sub sidebar-group-active open':'')}}">
  <a href="{{ route('vacancy.index')}}">
    <i class="ri-file-list-line"></i>
    <span class="menu-title">Vacancy</span>
  </a>
  <ul class="menu-content">
    <li class="{{($menu=='vacancy' && $submenu=='index'? 'active':'')}}">
      <a href="{{ route('vacancy.index')}}">
        <i class="ri-file-list-line"></i>
        <span class="menu-item">All Vacancy</span>
      </a>
    </li>
    <li class="{{($menu=='vacancy' && $submenu=='create'? 'active':'')}}">
      <a href="{{ route('vacancy.create')}}">
        <i class="ri-add-line"></i>
        <span class="menu-item">Create Vacancy</span>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item {{($menu=='user'?'has-sub sidebar-group-active open':'')}}">
  <a href="{{ route('users.index')}}">
    <i class="ri-user-line"></i>
    <span class="menu-title">Users</span>
  </a>
  <ul class="menu-content">
    <li class="{{($menu=='user' && $submenu=='index'? 'active':'')}}">
      <a href="{{ route('users.index')}}">
        <i class="ri-file-list-line"></i>
        <span class="menu-item">All Users</span>
      </a>
    </li>
    <li  class="{{($menu=='user' && $submenu=='create' ? 'active':'')}}">
      <a href="{{route('users.create')}}">
        <i class="ri-add-line"></i>
        <span class="menu-item">Create User</span>
      </a>
    </li>
  </ul>
</li>
<li  class="{{($menu=='settings' && $submenu=='settings' ? 'active':'')}}">
  <a href="{{route('settings.index')}}">
    <i class="ri-settings-2-line"></i>
    <span class="menu-item">Settings</span>
  </a>
</li>