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
                        <li class="breadcrumb-item active">Pembobotan</li>
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
                <h3 class="card-title">Pembobotan</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered w-100">
                    <thead>
                        <tr>
                            <th class="bg-info">ID</th>
                            <th class="bg-info">Pembuatan</th>
                            <th class="bg-info">User</th>
                            @foreach ($columnsBobot as $column)
                            @if($column != 'id' && $column != 'created_at' && $column != 'updated_at' && $column != 'users_id')
                            <th class="bg-info">{{ $column }}</th>
                            @endif
                            @endforeach
                            <th class="bg-info">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bobot as $b)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $b->created_at }}</td>
                            <td>{{ $b->user->name }}</td>   
                            @foreach ($columnsBobot as $column)
                            @if($column != 'id' && $column != 'created_at' && $column != 'updated_at' && $column != 'users_id')
                            <td>{{ $b->$column }}</td>
                            @endif
                            @endforeach
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{{ $b->id }}">Edit</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $b->id }}">Delete</button>
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
                        <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#addModal">Tambah Pembobotan</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- Modal Tambah -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('pembobotan.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Pembobotan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>User</label>
                        <select class="form-control" name="users_id" required>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @foreach ($columnsBobot as $column)
                        @if ($column != 'id' && $column != 'created_at' && $column != 'updated_at' && $column != 'users_id')
                            <div class="form-group">
                                <label>{{ ucfirst(str_replace('_', ' ', $column)) }}</label>
                                <input type="text" class="form-control" name="{{ $column }}" required>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Edit -->
@foreach ($bobot as $b)
    <div class="modal fade" id="editModal{{ $b->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $b->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('pembobotan.update', $b->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $b->id }}">Edit Pembobotan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>User</label>
                            <select class="form-control" name="users_id" required>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" @if ($user->id == $b->users_id) selected @endif>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @foreach ($columnsBobot as $column)
                            @if ($column != 'id' && $column != 'created_at' && $column != 'updated_at' && $column != 'users_id')
                                <div class="form-group">
                                    <label>{{ ucfirst(str_replace('_', ' ', $column)) }}</label>
                                    <input type="text" class="form-control" name="{{ $column }}" value="{{ $b->$column }}" required>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
<!-- Modal Delete -->
@foreach ($bobot as $b)
    <div class="modal fade" id="deleteModal{{ $b->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $b->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('pembobotan.destroy', $b->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel{{ $b->id }}">Hapus Pembobotan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Anda yakin ingin menghapus data ini?</p>
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