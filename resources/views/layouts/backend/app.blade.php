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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog | @yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/logo/logo.png') }}" type="image/png">


    <link rel="stylesheet" href="{{ asset('css/loader.css') }}">

   

    <!-- Ruang Admin  -->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/ruang-admin.min.css')}}" rel="stylesheet">
    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap DatePicker -->
    <link href="{{ asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">

    <script src="https://kit.fontawesome.com/d7e83bf142.js" crossorigin="anonymous"></script>

    <!-- Select2 -->
    <link href="{{ asset('assets/vendor/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css">


    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

    <!-- Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body id="page-top">
    {{-- <div class="load-data">
        <div class="loader"></div>
    </div> --}}
    <div id="wrapper">
        @include('layouts.backend.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            @yield('main')
        </div>
    </div>

    <!-- Modal Logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                    <form id="logout-app">
                        @csrf
                        <button type="button" class="btn btn-outline-primary"
                            data-dismiss="modal">Cancel</button>
                        <button id="submit" class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/vendor/jquery/jquery.min.js')}} "></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}} "></script>
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js')}} "></script>
    <script src="{{ asset('assets/js/ruang-admin.min.js')}} "></script>
    <script src="{{ asset('assets/js/currency.js')}} "></script>

    <!-- Select2 -->
    <script src="{{ asset('assets/vendor/select2/dist/js/select2.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script src="{{ asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>


    <script type="text/javascript">
        function getCookie(name) {
            let cookie = {};
            document.cookie.split(';').forEach(function(el) {
                let [k, v] = el.split('=');
                cookie[k.trim()] = v;
            })
            return cookie[name];
        }
        $(document).ready(function (){
            if (sessionStorage.getItem('success')) {
                let data = sessionStorage.getItem('success');
                toastr.success('', data, {
                    timeOut: 1500,
                    preventDuplicates: true,
                    progressBar: true,
                    positionClass: 'toast-top-right',
                });

                sessionStorage.clear();
            }

            const error = '{{ session('error') }}';
            if (error) {
                toastr.error('', error, {
                    timeOut: 1500,
                    preventDuplicates: true,
                    progressBar: true,
                    positionClass: 'toast-top-right',
                });

                sessionStorage.clear();
            }

            const success = '{{ session('success') }}';
            if (success) {
                toastr.success('', success, {
                    timeOut: 1500,
                    preventDuplicates: true,
                    progressBar: true,
                    positionClass: 'toast-top-right',
                });

                sessionStorage.clear();
            }


            $('#simple-date-1 .input-group.date').datepicker({
                todayBtn: 'linked',
                todayHiglight: true,
                autoclose: true,
            });

            var api = "{{env('API_URL')}}";
            $("#logout-app").on('submit', function(event) {
                event.preventDefault();
                $(".preloader").fadeIn();

                $.ajax({
                    url: api + "/logout",
                    type: "POST",
                    headers: {
                        'Authorization': 'Bearer ' + getCookie('token'),
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $(".preloader").fadeOut();
                        if (response.success) {
                            window.location.href = "/login";
                            document.cookie = "token=";
                        }
                    },
                });
            });

        });

    </script>
</body>

</html>
