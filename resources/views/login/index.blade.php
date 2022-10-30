@extends('login.app')
@section('title','Login')
@section('main')
    <link rel="icon" href="{{ asset('assets/img/logo/logo.png') }}" type="image/png">
    <!-- Login Content -->
    <div class="container-login">
        <div class="row justify-content-center mt-5">
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-8 text-center">
                <div class="card shadow-sm my-4 border-bottom-primary">
                    <div class="card-header">
                        <img src="{{ asset('assets/img/logo/logo.png') }}" class="card-img-bottom mt-2"
                            style="max-width: 100px" alt="Photo">
                    </div>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <h1 class="h4 text-gray-900 font-weight-bold mt-4 mb-0">Sumenep Blog</h1>
                                <div class="login-form">
                                    <small class="text-danger" id="message-error"></small>
                                    <form class="user" id="login">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" id="email"
                                                aria-describedby="emailHelp" placeholder="Email" autofocus>
                                            <small class="text-danger" id="email-error"></small>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" id="password"
                                                placeholder="Password">
                                            <small class="text-danger" id="password-error"></small>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" id="submit"
                                                class="btn btn-primary btn-block">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- Login Content -->

  <script type="text/javascript">
    $("#login").on('submit', function(event) {
        event.preventDefault();
        $(".preloader").fadeIn();
        let formData = new FormData(this);
        $('#email-error').text('');
        $('#password-error').text('');
        $('#message-error').text('');
        var api = "{{env('API_URL')}}";
        // console.log(api);

        $.ajax({
            url: api + '/login',
            type: "POST",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                $(".preloader").fadeOut();
                if (response.success) {
                    document.cookie = "token=" + response.token;
                    sessionStorage.setItem('success', response.message);
                    window.location.href = "/dashboard";
                }
            },
            error: function(response) {
                $(".preloader").fadeOut();
                $('#email-error').text(response.responseJSON.email);
                $('#password-error').text(response.responseJSON.password);
                $('#message-error').text(response.responseJSON.message);
            },
        });
    });
</script>
@endsection

