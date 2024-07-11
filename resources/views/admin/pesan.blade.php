@extends('layout.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Inbox</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Inbox</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Pesan</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.pesan', 'Belum Dibaca') }}" class="nav-link d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <i class="far fa-envelope mr-2"></i>
                                        <p class="mb-0">Belum Dibaca</p>
                                    </div>
                                    @php
                                    $belumDibacaTotal = $counts->where('status', 'Belum Dibaca')->first();
                                    @endphp
                                    <span class="badge bg-primary">
                                        {{ $belumDibacaTotal ? $belumDibacaTotal->total : 0 }}
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.pesan', 'Dibaca') }}" class="nav-link d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <i class="far fa-envelope-open mr-2"></i>
                                        <p class="mb-0">Dibaca</p>
                                    </div>
                                    @php
                                    $belumDibacaTotal = $counts->where('status', 'Dibaca')->first();
                                    @endphp
                                    <span class="badge bg-secondary">
                                        {{ $belumDibacaTotal ? $belumDibacaTotal->total : 0 }}
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.pesan', 'Diproses') }}" class="nav-link d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-cog fa-spin mr-2"></i>
                                        <p class="mb-0">Proses</p>
                                    </div>
                                    @php
                                    $belumDibacaTotal = $counts->where('status', 'Diproses')->first();
                                    @endphp
                                    <span class="badge bg-light">
                                        {{ $belumDibacaTotal ? $belumDibacaTotal->total : 0 }}
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.pesan', 'Di Tindak Lanjuti') }}" class="nav-link d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-exclamation-circle mr-2"></i>
                                        <p class="mb-0">Tindak Lanjut</p>
                                    </div>
                                    @php
                                    $belumDibacaTotal = $counts->where('status', 'Di Tindak Lanjuti')->first();
                                    @endphp
                                    <span class="badge bg-info">
                                        {{ $belumDibacaTotal ? $belumDibacaTotal->total : 0 }}
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.pesan', 'Pending') }}" class="nav-link d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <i class="far fa-clock mr-2"></i>
                                        <p class="mb-0">Pending</p>
                                    </div>
                                    @php
                                    $belumDibacaTotal = $counts->where('status', 'Pending')->first();
                                    @endphp
                                    <span class="badge bg-warning">
                                        {{ $belumDibacaTotal ? $belumDibacaTotal->total : 0 }}
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.pesan', 'Selesai') }}" class="nav-link d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <i class="far fa-check-circle mr-2"></i>
                                        <p class="mb-0">Selesai</p>
                                    </div>
                                    @php
                                    $belumDibacaTotal = $counts->where('status', 'Selesai')->first();
                                    @endphp
                                    <span class="badge bg-success">
                                        {{ $belumDibacaTotal ? $belumDibacaTotal->total : 0 }}
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.pesan', 'Hapus') }}" class="nav-link d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <i class="far fa-trash-alt mr-2"></i>
                                        <p class="mb-0">Hapus</p>
                                    </div>
                                    @php
                                    $belumDibacaTotal = $counts->where('status', 'Hapus')->first();
                                    @endphp
                                    <span class="badge bg-danger">
                                        {{ $belumDibacaTotal ? $belumDibacaTotal->total : 0 }}
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Inbox - {{ $status }}</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control" placeholder="Search Mail">
                                <div class="input-group-append">
                                    <div class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped">
                                <tbody>
                                    @foreach($messages as $message)
                                    <tr>
                                        
                                        <td class="mailbox-name">
                                            <a href="{{ route('read-mail', ['id_message' => $message->id_message, 'previous_status' => $status]) }}">
                                                {{ $message->user ? $message->user->name : 'Unknown User' }}
                                            </a>
                                        </td>
                                        <td class="mailbox-subject"><b>{{ $message->subject }}</b> - {{ \Illuminate\Support\Str::limit($message->pesan, 50) }}</td>
                                        <td class="mailbox-attachment"></td>
                                        <td class="mailbox-date">{{ \Carbon\Carbon::parse($message->waktu_kirim)->diffForHumans() }}</td>
                                        <td>
                                            <form action="{{ route('pesan.delete.selected') }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="selected_messages[]" value="{{ $message->id_message }}">
                                                <button type="submit" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer p-0" style="height: 20px">
                        <div class="mailbox-controls">
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection