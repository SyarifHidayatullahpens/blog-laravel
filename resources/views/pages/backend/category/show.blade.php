@extends('layouts.inventories.main-content')
@section('title','Detail Unit')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Unit {{ $unit->name }}</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Inventaris</a></li>
            <li class="breadcrumb-item active" aria-current="page">Unit</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <a href="{{ route('units.index') }}" class="btn btn-sm btn-primary text-white">
                        <i class="fa-solid fa-arrow-left"></i>
                    &nbsp;Kembali</a>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-stripped" id="unit_table">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Brand</th>
                                <th>Category</th>
                                <th>Ruangan</th>
                                <th>Stok</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Brand</th>
                                <th>Category</th>
                                <th>Ruangan</th>
                                <th>Stok</th>
                            </tr>
                        </tfoot>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script type="application/javascript">
    $(document).ready(function () {
        var api = "{{env('API_URL')}}";
        $('#unit_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('units.show', $unit->id) }}",
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
                    data: 'brand',
                },
                {
                    data: 'category'
                },
                {
                    data: 'room'
                },
                {
                    data: 'stock'
                },
            ],
        });
    });
</script>
@endsection
