@extends('layouts.backend.main-content')
@section('title','Dashboards')
@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="row mb-3">
        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Kategori</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">3</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <!-- <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span> -->
                                <a href="{{ route('categories.index') }}">
                                    <span>Lihat List Kategori</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book-reader fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New User Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Posts</div>
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">3</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <!-- <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span> -->
                                <a href="{{ route('posts.index') }}">
                                    <span>Lihat List posts </span>
                                </a>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-bullhorn fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Area Chart -->
        <!-- <div class="col-xl-12 col-lg-7">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Barang Baru</h6>
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
              aria-labelledby="dropdownMenuLink">
              <div class="dropdown-header">Dropdown Header:</div>
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="chart-area">
            <canvas id="myAreaChart"></canvas>
          </div>
        </div>
      </div>
    </div> -->
    </div>
</div>
</div>

@endsection
