@extends('layout.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 style="font-weight: 700;">{{ $message->user->name }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a>Home</a></li>
                        <li class="breadcrumb-item active">Pesan</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <a href="{{ route('admin.pesan', ['status' => $previous_status]) }}" class="btn btn-default bg-transparent mr-3" style="border: 0;"><i class="fas fa-reply"></i></a>
                    </div>
                    <div class="card-body p-0">
                        <div class="mailbox-read-info">
                            <h5 style="font-weight: 700; margin-bottom: 5px">{{ $message->subject }}</h5>
                            <h6>Nama Pengirim: {{ $message->user ? $message->user->name : 'Unknown Sender' }}
                                <span class="mailbox-read-time float-right">{{ \Carbon\Carbon::parse($message->waktu_kirim)->format('d M. Y H:i A') }}</span>
                            </h6>
                        </div>
                        <div class="mailbox-read-message">
                            <p>{{ $message->pesan }}</p>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <form id="statusForm" action="{{ route('pesan.updateStatus', $message->id_message) }}" method="POST">
                            @csrf
                            <!-- Checkbox Diproses -->
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="diprosesCheckbox" name="status[]" value="Diproses">
                                <label class="form-check-label" for="diprosesCheckbox">Diproses</label>
                            </div>

                            <!-- Checkbox Selesai -->
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="selesaiCheckbox" name="status[]" value="Selesai">
                                <label class="form-check-label" for="selesaiCheckbox">Selesai</label>
                            </div>

                            <!-- Checkbox Pending -->
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="pendingCheckbox" name="status[]" value="Pending">
                                <label class="form-check-label" for="pendingCheckbox">Pending</label>
                            </div>

                            <!-- Checkbox Tindak Lanjut -->
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="tindakLanjutCheckbox" name="status[]" value="Tindak Lanjut">
                                <label class="form-check-label" for="tindakLanjutCheckbox">Tindak Lanjut</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
