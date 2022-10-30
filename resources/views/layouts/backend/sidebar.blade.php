<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('assets/img/logo/logo.png') }}">
        </div>
        <div class="sidebar-brand-text mx-3">My Blog</div>
    </a>
    <hr class="sidebar-divider my-0">
    @if($auth->level_id == 1 || $auth->level_id != 1)
    <li class="nav-item {{ $page == 'dashboard' ? 'active' : '' }}">
        <a class="nav-link " href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    @endif
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Features
    </div>
    @if($auth->level_id == 1)
    <li class="nav-item  {{ $page == 'category' ? 'active' : '' }}">
        <a class="nav-link {{ request()->routeIs('categories.index') ? 'active' : ''}}"
            href="{{ route('categories.index') }}">
            <i class="fas fa-clipboard"></i>
            <span>Kategori</span>
        </a>
    </li>
    @endif
    @if($auth->level_id == 1)
    <li class="nav-item {{ $page == 'posts' ? 'active' : '' }}">
        <a class="nav-link {{ request()->routeIs('posts*') ? 'active' : ''}}" href="{{ route('posts.index')}}">
            <i class="fas fa-hand-holding-usd"></i>
            <span>Post</span>
        </a>
    </li>
    @endif
</ul>
