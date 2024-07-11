@extends('layout.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper mt-2">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $tipe }}</h3>

                        <p>List Kriteria</p>
                    </div>
                    <div class="icon">
                        <i class="ion fas fa-cube"></i>
                    </div>
                    <a href="{{ route('admin.kriteria') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $produk }}</h3>

                        <p>List Alternatif</p>
                    </div>
                    <div class="icon">
                        <i class="ion fas fa-stream"></i>
                    </div>
                    <a href="{{ route('admin.alternatif') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $admin }}</h3>

                        <p>Jumlah Administrator</p>
                    </div>
                    <div class="icon">
                        <i class="ion fas fa-user"></i>
                    </div>
                    <a href="{{ route('admin.akun') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $user }}</h3>

                        <p>Jumlah User</p>
                    </div>
                    <div class="icon">
                        <i class="ion fas fa-users"></i>
                    </div>
                    <a href="{{ route('admin.akun') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
@endsection