@extends('layouts.backend.main-content')
@section('title','Posts')

@section('content')
<div class="container-fluid mb-4" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Posts</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Posts</a></li>
        </ol>
    </div>
    <div class="card" style="margin-top: -20px !important">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="font-weight-bold text-primary">
                Tambah Posts
            </h6>
        </div>
        <div class="card-body mt--2">
            <form id="posts-create" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                            <span class="text-danger" id="error_title"></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Kategori</label>
                            <a href="javascript:void(0)" id="add_category"><span><i class="fa-solid fa-circle-plus fa-lg text-primary"></i></span></a>
                            <select class="form-control" name="category_id" id="select2_category">
                            </select>
                            <span class="text-danger" id="error_category"></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Penulis</label>
                            <select class="form-control" name="user_id" id="select2_users">
                            </select>
                            <span class="text-danger" id="error_user"></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label" for="exampleFormControlInput1">Gambar</label>
                            <input type="file" class="form-control" name="image" id="inventory" placeholder=""
                            onchange="previewImage();" style="display: block; line-height: 100%">
                            <img id="image-preview" style="width: 150px; margin-top: 10px"/>
                                <!-- {{-- <img id="image-preview" style="background-size: cover; height: 100px; width: 150px; margin-top: 10px;"/> --}} -->
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="form-control textarea" name="content" id="textarea"
                                 rows="4" cols="50"></textarea>
                        </div>
                    </div>
                </div>
                <div class="float-right">
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary text-white">Kembali</a>
                    <button type="submit" class="btn btn-primary text-white">Submit</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

    @include('pages.backend.posts.modal')

    <script type="application/javascript">

        $(document).ready(function () {
            var api = "{{env('API_URL')}}";

            $('#select2_category').select2();

            $('#select2_category').select2({
                placeholder: "Pilih Kategori",
                allowClear: true,
                ajax: {
                    url: api + "/v1/get-categories",
                    allowClear: true,
                    type: 'POST',
                    delay: 250,
                    headers: {
                        'Authorization': 'Bearer ' + getCookie('token'),
                        'Accept': 'application/json'
                    },
                    data: function(params) {
                        return {
                            "_token": "{{ csrf_token() }}",
                            search: params.term // search term
                        };
                    },
                    processResults: function(response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
            });

            $('#select2_users').select2();

            $('#select2_users').select2({
                placeholder: "Pilih Penulis",
                allowClear: true,
                ajax: {
                    url: api + "/v1/get-users",
                    allowClear: true,
                    type: 'POST',
                    delay: 250,
                    headers: {
                        'Authorization': 'Bearer ' + getCookie('token'),
                        'Accept': 'application/json'
                    },
                    data: function(params) {
                        return {
                            "_token": "{{ csrf_token() }}",
                            search: params.term // search term
                        };
                    },
                    processResults: function(response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
            });

            $('#add_category').click(function () {
                $('#form-create').trigger("reset"); //mereset semua input dll didalamnya
                $('#modal-judul').html("Tambah Kategori");
                $('#create-modal').modal('show'); //
            });

            $("#form-create").on('submit', function (e) {
                e.preventDefault();
                let formData = new FormData(this);
                $('#error_name').text('');

                $.ajax({
                    url: api + '/v1/categories',
                    type: "POST",
                    headers: {
                        'Authorization': 'Bearer ' + getCookie('token'),
                        'Accept': 'application/json'
                    },
                    contentType: 'application/json',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    cors: true,
                    success: function (response) {
                        if (response.success == true) {
                            $("#form-create")[0].reset();
                            $('#create-modal').modal('hide');
                            toastr.success(response.message);
                            oTable.ajax.reload();
                        }
                    },
                    error: function (response) {
                        $('#error_name').text(response.responseJSON.name[0]);
                    },
                });
            });
            
            $('#posts-create').on('submit',function(e){
                // alert('okoko');
                e.preventDefault();
                let formData = new FormData(this);
                $('#error_name').text('');
                $('#error_category').text('');
                $('#error_content').text('');
    
                $.ajax({
                    url: api + '/v1/posts',
                    type: "POST",
                    headers: {
                        'Authorization': 'Bearer ' + getCookie('token'),
                        'Accept': 'application/json'
                    },
                    contentType: 'application/json',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    cors: true,
                    success: function (response) {
                        sessionStorage.setItem('success', response.message);
                        window.location.href = "/posts";
                    },
                    error: function (response) {
                        toastr.error('error','isian tidak valid');
                        $('#error_name').text(response.responseJSON.name[0]);
                        $('#error_category').text(response.responseJSON.category_id[0]);
                        $('#error_content').text(response.responseJSON.content[0]);
                    },
                });
            });
        });


        function previewImage() {
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("image").files[0]);

                oFReader.onload = function(oFREvent) {
                    document.getElementById("image-preview").src = oFREvent.target.result;
                };
        };
    </script>


@endsection