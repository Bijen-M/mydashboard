<?php
$menu = isset($menu) ? $menu : '';
$submenu = isset($submenu) ? $submenu : '';
?>

<li class="navigation-header"><span>CMS</span></li>
    
<li class="navigation-header"><span>CMS</span></li>

<li class=" nav-item">
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