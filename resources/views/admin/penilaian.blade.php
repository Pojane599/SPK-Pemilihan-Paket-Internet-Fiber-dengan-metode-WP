@extends('layout.app')

@section('content')
<style>
    .input-with-prefix {
        position: relative;
        display: inline-block;
        width: 100%;
    }

    .input-with-prefix input {
        padding-left: 30px; /* Sesuaikan ukuran padding dengan panjang teks prefix */
    }

    .input-with-prefix::before {
        content: "Rp.";
        position: absolute;
        left: 10px; /* Atur posisi teks prefix di sini */
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
        color: #495057; /* Sesuaikan warna teks prefix */
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Penilaian</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">PENILAIAN</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered w-100">
                    <thead class="bg-dark text-center">
                        <tr class="text-center">
                            <th>ID</th>
                            @foreach ($columnsPenilaian as $column)
                            <th>{{ ucwords(str_replace('_', ' ', $column)) }}</th>
                            @endforeach
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($nilai as $n)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            @foreach ($columns as $column)
                            @if($column == 'harga')
                            <td>Rp. {{ number_format($n->$column, 0, ',', '.') }}</td>
                            @elseif($column == 'bandwidth' || $column == 'downgrade_speed')
                            <td>{{ $n->$column }} Mbps</td>
                            @elseif($column == 'batas_penggunaan')
                            <td>{{ $n->$column }} GB</td>
                            @elseif($column == 'jumlah_perangkat')
                            <td>{{ $n->$column }} Perangkat</td>
                            @elseif($column != 'id' && $column != 'created_at' && $column != 'updated_at')
                            <td>{{ $n->$column }}</td>
                            @endif
                            @endforeach
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{{ $n->id }}">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $n->id }}">Delete</button>
                                </div>
                            </td>
                        </tr>
                        <div class="modal fade" id="editModal{{ $n->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $n->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="{{ route('penilaian.update', $n->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel{{ $n->id }}">Edit Penilaian</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @foreach ($columnsPenilaian as $column)
                                            <div class="form-group">
                                                <label for="{{ $column }}">{{ ucwords(str_replace('_', ' ', $column)) }}</label>
                                                @if ($column == 'harga')
                                                <input type="text" class="form-control harga" id="{{ $column }}" name="{{ $column }}" value="Rp. {{ number_format($n->$column, 0, ',', '.') }}" required>
                                                @else
                                                <input type="text" class="form-control" id="{{ $column }}" name="{{ $column }}" value="{{ $n->$column }}" required>
                                                @endif
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="deleteModal{{ $n->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $n->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="{{ route('penilaian.destroy', $n->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel{{ $n->id }}">Hapus Penilaian</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah Anda yakin ingin menghapus penilaian ini?</p>
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
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                <div class="row">
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#addModal">Tambah Penilaian</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- Modal Tambah Penilaian -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('penilaian.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Penilaian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @foreach ($columnsPenilaian as $column)
                    <div class="form-group">
                        <label for="{{ $column }}">{{ ucwords(str_replace('_', ' ', $column)) }}</label>
                        @if ($column == 'harga')
                        <div class="input-with-prefix">
                            <input type="text" class="form-control harga" id="{{ $column }}" name="{{ $column }}" required>
                        </div>
                        @else
                        <input type="text" class="form-control" id="{{ $column }}" name="{{ $column }}" required>
                        @endif
                    </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection