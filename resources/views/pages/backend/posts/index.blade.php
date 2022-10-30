@extends('layouts.backend.main-content')
@section('title','Posts')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Post</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Post</a></li>
        </ol>
    </div>
    <div class="row">
    </div>
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Post</h6>
                <a class="btn btn-sm btn-primary text-white" href="{{ route('posts.create') }}" style="cursor: pointer"> <span><i
                            class="fa-solid fa-plus"></i>&nbsp;Tambah </span> </a>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush" width="100%" id="posts_table">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Penulis</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Penulis</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
</div>


<script type="application/javascript">
    $(document).ready(function() {
        var api = "{{env('API_URL')}}";
        $('#posts_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('posts.index') }}",
                type: 'GET',
            },
            "responsive": true,
            "language": {
                "oPaginate": {
                    "sNext": "<i class='fas fa-angle-right'>",
                    "sPrevious": "<i class='fas fa-angle-left'>",
                },
            },

            columns: [{
                    data: 'DT_RowIndex',
                },
                {
                    data: 'title',
                },
                {
                    data: 'category',
                },
                {
                    data: 'user',
                },
                {
                    data: 'action'
                },
            ],
        });
    });


    var data_id = '';
    var api = "{{env('API_URL')}}";
    $(document).on('click', '.btn-show',function() {
        data_id = $(this).data('id');
        $.ajax({
            type: 'GET',
            url: api +'/api/posts'+ data_id,
            headers: {
                    'Authorization': 'Bearer ' + getCookie('token'),
                    'Accept': 'application/json',
                    'Access-Control-Allow-Origin': '*',
                    },
            contentType: 'application/json',
            cache: false,
            contentType: false,
            processData: false,
            cors: true,
            success: function (response) {
                $('#show-modal').modal('show');
                $('#judul-show').text(data.name);
            }
        });
    });


    function deleteItem(e) {
        var api = "{{env('API_URL')}}";
        let id = e.getAttribute('data-id');
        // console.log(id);
        let posts = e.getAttribute('data-name');

        Swal.fire({
            title: 'Anda yakin?',
            text: "Ingin menghapus " + posts + "?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'DELETE',
                    url: api + '/v1/posts/' + id,
                    headers: {
                        'Authorization': 'Bearer ' + getCookie('token'),
                        'Accept': 'application/json'
                    },
                    contentType: 'application/json',
                    success: function (response) {
                            toastr.success(response.message);
                            var oTable = $('#posts_table').DataTable(); //inialisasi datatable
                            oTable.ajax.reload(); //reset datatable
                    }
                })
            }
        });
    }
</script>

@endsection
