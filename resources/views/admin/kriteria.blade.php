@extends('layout.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Kriteria</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">KRITERIA</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered w-100">
                    <thead class="bg-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Tipe</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kriteria as $k)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ ucfirst(str_replace('_', ' ', $k['nama'])) }}</td>
                            <td>{{ $k['tipe'] }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-warning btn-sm mr-2" data-toggle="modal" data-target="#editKriteria{{ $loop->iteration }}">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm mr-2" data-toggle="modal" data-target="#deleteKriteria{{ $loop->iteration }}">Delete</button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                <div class="row">
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahKriteria">
                            Tambah Data
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal Tambah Kriteria -->
<div class="modal fade" id="tambahKriteria" tabindex="-1" role="dialog" aria-labelledby="tambahKriteriaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('kriteria.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahKriteriaLabel">Tambah Kriteria Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Kriteria</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="tipe">Tipe Kriteria</label>
                        <select class="form-control" id="tipe" name="tipe" required>
                            <option value="Benefit">Benefit</option>
                            <option value="Cost">Cost</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach($kriteria as $k)
<!-- Modal Edit Kriteria {{ $loop->iteration }} -->
<div class="modal fade" id="editKriteria{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="editKriteria{{ $loop->iteration }}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('kriteria.update', $k['nama']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editKriteria{{ $loop->iteration }}Label">Edit Kriteria: {{ ucfirst(str_replace('_', ' ', $k['nama'])) }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Kriteria</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ ucfirst(str_replace('_', ' ', $k['nama'])) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="tipe">Tipe Kriteria</label>
                        <select class="form-control" id="tipe" name="tipe" required>
                            <option value="Benefit" {{ $k['tipe'] == 'Benefit' ? 'selected' : '' }}>Benefit</option>
                            <option value="Cost" {{ $k['tipe'] == 'Cost' ? 'selected' : '' }}>Cost</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@foreach($kriteria as $k)
<!-- Modal Hapus Kriteria {{ $loop->iteration }} -->
<div class="modal fade" id="deleteKriteria{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="deleteKriteria{{ $loop->iteration }}Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('kriteria.delete', $k['nama']) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteKriteria{{ $loop->iteration }}Label">Konfirmasi Hapus Kriteria: {{ ucfirst(str_replace('_', ' ', $k['nama'])) }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus kriteria ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@endsection