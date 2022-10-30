<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <a class="navbar-brand text-white font-weight-bold" href="#">Sumenep Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link text-white" href="#">Post <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Kategori
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @if(@isset($category))
                        @foreach($category as $data)
                            <a href="{{ route('category', $data->name) }}" class="dropdown-item">{{ $data->name }}</a>
                        @endforeach
                    @else
                        <p>Kategori belum tersedia</p>
                    @endif
                </div>
            </li>
        </ul>
        <!-- <form class="form-inline my-2 my-lg-0 d-flex justify-content-center ">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0 mr-2" type="submit">Search</button>
        </form> -->
    </div>
</nav>