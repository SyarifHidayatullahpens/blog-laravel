@extends('layouts.backend.main-content')
@section('title','Kategori')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kategori</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Sumenep Blog</li>
            <li class="breadcrumb-item active" aria-current="page">Kategori</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
                    <a class="btn btn-sm btn-primary text-white" style="cursor: pointer" href="javascript:void(0)"
                        id="add-btn"> <span><i class="fa-solid fa-plus"></i>&nbsp;Kategori </span> </a>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush" width="100%" id="category_table">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@include('pages.backend.category.modal')

<script type="application/javascript">
    $(document).ready(function () {
        var api = "{{env('API_URL')}}";
        $('#category_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('categories.index') }}",
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
                    data: 'name',
                },
                {
                    data: 'action'
                },
            ],
        });

        $('#add-btn').click(function () {
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
                        toastr.success(response.message);
                        $("#form-create")[0].reset();
                        $('#create-modal').modal('hide'); //modal hide
                        var oTable = $('#category_table').DataTable(); //inialisasi datatable
                        oTable.ajax.reload(); //reset datatable
                    }
                },
                error: function (response) {
                    $('#error_name').text(response.responseJSON.name[0]);
                },
            });
        });

        $('#form-edit').on('submit', function (event) {
            event.preventDefault();
            let formData = new FormData(this);
            let id = $('#id').val();
            var data = [
                $('#error_edit_name').text(''),
            ];

            $.ajax({
                url: api + '/v1/categories/' + id,
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
                        toastr.success(response.message);
                        $("#form-edit")[0].reset();
                        $('#edit-modal').modal('hide'); //modal hide
                        var oTable = $('#category_table').DataTable(); //inialisasi datatable
                        oTable.ajax.reload(); //reset datatable
                    }
                },
                error: function (response) {
                    $('#error_edit_name').text(response.responseJSON.errors.name[0]);
                },
            });
        })
    });

    function updateItem(e) {
        var api = "{{env('API_URL')}}";
        let id = e.getAttribute('data-id');
        let unit = e.getAttribute('data-name');
        $.ajax({
            type: 'GET',
            url: api + '/v1/categories/' + id + '/edit',
            headers: {
                'Authorization': 'Bearer ' + getCookie('token'),
                'Accept': 'application/json'
            },
            contentType: 'application/json',
            success: function (response) {
                $('#id').val(response.id);
                $('#edit_name').val(response.name);
                $('#edit-modal').modal('show');
            }
        })
    }

    function deleteItem(e) {
        var api = "{{env('API_URL')}}";
        let id = e.getAttribute('data-id');
        let unit = e.getAttribute('data-name');

        Swal.fire({
            title: 'Are you sure?',
            text: "do yo want to delete " + unit + "?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'DELETE',
                    url: api + '/v1/categories/' + id,
                    headers: {
                        'Authorization': 'Bearer ' + getCookie('token'),
                        'Accept': 'application/json'
                    },
                    contentType: 'application/json',
                    success: function (response) {
                        if (response.success == true) {
                            toastr.success(response.message);
                            $("#form-create")[0].reset();
                            $('#create-modal').modal('hide'); //modal hide
                            var oTable = $('#category_table')
                                .DataTable(); //inialisasi datatable
                            oTable.ajax.reload(); //reset datatable
                        }
                    }
                })
            }
        })
    }

</script>
@endsection
