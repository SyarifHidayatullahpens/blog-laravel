<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>

    <div class="container-fluid">
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
                                    <a href="{{ route('blog.category', $data->name) }}" class="dropdown-item">{{ $data->name }}</a>
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
                <!-- <button class="btn btn-dark text-white" href="{{ route('login') }}">Login</button> -->
            </div>
        </nav>
        <section class="mt-3">
            <h3>All Post</h3>
            <p class="text-muted fs-4">{{ \Carbon\Carbon::now()->format('d M Y') }}</p>
            <div class="mt-3">
                <div class="row">
                    @foreach($posts as $data)
                            <div class="col-md-3 mb-3">
                                <div class="card h-200" style="width: 18rem;">
                                    <img class="card-img-top" src="https://via.placeholder.com/5/20" style="height: 12em" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $data->title }}</h5>
                                        <p>
                                            <small class="text-danger">
                                                By. <a href="#">{{ $data->user->username }}</a> 
                                                {{ \Carbon\Carbon::parse($data->created_at)->diffForHumans() }}
                                            </small>
                                        </p>
                                        <p class="card-text">
                                            {!! Illuminate\Support\Str::words($data->content, 3, '...', 'utf-8') !!}
                                        </p>
                                        <a href="" class="fs-4 btn-sm btn-primary text-white" style="text-decoration: none;">Read More...</a>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>