<!-- Modal Form Tambah Data -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="modalFormLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFormLabel">Pembobotan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('user.addData') }}">
                    @csrf
                    <!-- Loop through the columns to create labels -->
                    @foreach ($BobotColumns as $index => $column)
                    <div class="mb-3">
                        <label for="{{ $column }}" class="form-label">{{ ucfirst(str_replace('_', ' ', $column)) }}</label>
                        <input type="number" class="form-control" id="{{ $column }}" name="{{ $column }}" required>
                    </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>