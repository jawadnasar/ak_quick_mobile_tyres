<!-- ======= Sidebar ======= -->
@php
    function isActive($routes, $output = 'active') {
        return request()->routeIs($routes) ? $output : '';
    }
@endphp

<aside id="sidebar" class="sidebar">
<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link {{ isActive('dashboard') }}" href="{{ route('dashboard')}}">
      <i class="bi bi-speedometer2"></i>
      <span>Dashboard</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}" href="{{ route('categories.index')}}">
      <i class="bi bi-folder2-open"></i>
      <span>Categories</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link {{ request()->routeIs('projects.*') ? 'active' : '' }}" href="{{ route('projects.index')}}">
      <i class="bi bi-briefcase"></i>
      <span>Portfolio Projects</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link {{ isActive('feedbacks.*') }}" href="{{ route('feedbacks.index')}}">
      <i class="bi bi-chat-left-text"></i>
      <span>Feedbacks</span>
    </a>
  </li>

  <li class="nav-heading">Website</li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('home') }}" target="_blank">
      <i class="bi bi-box-arrow-up-right"></i>
      <span>View Public Site</span>
    </a>
  </li>

  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
  </form>
</ul>
</aside>
