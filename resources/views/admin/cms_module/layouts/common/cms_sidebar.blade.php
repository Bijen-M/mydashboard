<?php
$menu = isset($menu) ? $menu : '';
$submenu = isset($submenu) ? $submenu : '';
?>

<li class="navigation-header"><span>CMS</span></li>
    
<li class="navigation-header"><span>CMS</span></li>

{{-- <li class=" nav-item">
  <a href="#">
    <i class="ri-menu-3-line"></i>
    <span class="menu-title">Menu</span>
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
</li> --}}
<li class="nav-item {{($menu=='banner'?'has-sub sidebar-group-active open':'')}}">
  <a href="{{ route('banners.index')}}">
    <i class="ri-image-line"></i>
    <span class="menu-title">Banners</span>
  </a>
  <ul class="menu-content">
    <li class="{{($menu=='banner' && $submenu=='index'? 'active':'')}}">
      <a href="{{ route('banners.index')}}">
        <i class=" "></i>
        <span class="menu-item">All Banners</span>
      </a>
    </li>
    <li  class="{{($menu=='banner' && $submenu=='create' ? 'active':'')}}">
      <a href="{{route('banners.create')}}">
        <i class=" "></i>
        <span class="menu-item">Create New Banner</span>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item {{($menu=='posts'?'has-sub sidebar-group-active open':'')}}">
  <a href="{{ route('posts.index')}}">
    <i class="ri-menu-3-line"></i>
    <span class="menu-title">Posts</span>
  </a>
  <ul class="menu-content">
    <li class="{{($menu=='posts' && $submenu=='index'? 'active':'')}}">
      <a href="{{ route('posts.index')}}">
        <i class=" "></i>
        <span class="menu-item">All posts</span>
      </a>
    </li>
    <li>
      <a href="{{route('posts.create')}}">
        <i class="{{($menu=='posts' && $submenu=='create'?'active':'')}} "></i>
        <span class="menu-item">Create Posts</span>
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
        <i class=" "></i>
        <span class="menu-item">About Us headings</span>
      </a>
    </li>
    <li  class="{{($menu=='about-us' && $submenu=='create' ? 'active':'')}}">
      <a href="{{route('about-us.create')}}">
        <i class=" "></i>
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
        <i class=" "></i>
        <span class="menu-item">All Services</span>
      </a>
    </li>
    <li  class="{{($menu=='services' && $submenu=='create' ? 'active':'')}}">
      <a href="{{route('services.create')}}">
        <i class=" "></i>
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
            <i class=" "></i>
            <span class="menu-item">All projects</span>
          </a>
        </li>
        <li  class="{{($menu=='projects' && $submenu=='create' ? 'active':'')}}">
          <a href="{{route('projects.create')}}">
            <i class=" "></i>
            <span class="menu-item">Create New Project</span>
          </a>
        </li>
      </ul>
    </li>
  </ul>
  <ul class="menu-content">
  <li class="nav-item {{($menu=='projecttype'?'has-sub sidebar-group-active open':'')}}">
    <a href="{{ route('project.type.index')}}">
      <i class="ri-menu-3-line"></i>
      <span class="menu-title">Project Types</span>
    </a>
    <ul class="menu-content">
      <li class="{{($menu=='projecttype' && $submenu=='index'? 'active':'')}}">
        <a href="{{ route('project.type.index')}}">
          <i class=" "></i>
          <span class="menu-item">All Project Types</span>
        </a>
      </li>
      <li  class="{{($menu=='projecttype' && $submenu=='create' ? 'active':'')}}">
        <a href="{{route('project.type.create')}}">
          <i class=" "></i>
          <span class="menu-item">Create Project Type</span>
        </a>
      </li>
    </ul>
  </li>
  </ul>
</li>
<li class="nav-item {{($menu=='contactus'?'has-sub sidebar-group-active open':'')}}">
  <a href="{{ route('contactus.index')}}">
    <i class="ri-service-line"></i>
    <span class="menu-title">Contact Us</span>
  </a>
  <ul class="menu-content">
    <li class="{{($menu=='contactus' && $submenu=='index'? 'active':'')}}">
      <a href="{{ route('contactus.index')}}">
        <i class=" "></i>
        <span class="menu-item">All Contacts</span>
      </a>
    </li>
  </ul>
</li>