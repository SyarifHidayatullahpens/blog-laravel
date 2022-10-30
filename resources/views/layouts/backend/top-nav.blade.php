@php
    $user = \Http::withHeaders([
    'Authorization' => 'Bearer ' . \Request::cookie('token'),
    'ContentType' => 'application/json',
    'Accept' => 'application/json',
    ])
    ->get(env('API_URL').'/user')
    ->json();
    $auth = json_decode(json_encode($user))->data;
@endphp

<nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
    <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <ul class="navbar-nav ml-auto">
        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="http://192.168.43.105:8000/{{ $auth->photo }}" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small">Admin</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                {{-- <a class="dropdown-item" href="{{ route('profile') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a> --}}
                <div class="dropdown-divider"></div>
                <a class="dropdown-item logout" href="javascript:void(0);" data-toggle="modal"
                    data-target="#logoutModal" id="logout">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
