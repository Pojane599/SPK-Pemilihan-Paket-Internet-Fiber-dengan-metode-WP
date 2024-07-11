<!-- Modal Perhitungan WP -->
<div class="modal fade" id="modalPerhitungan" tabindex="-1" aria-labelledby="modalPerhitunganLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPerhitunganLabel">PERHITUNGAN</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5>Hasil Normalisasi Bobot</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            @foreach ($BobotColumns as $column)
                            <th>{{ $column }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($hasilNormalWeights) && is_array($hasilNormalWeights) && count($hasilNormalWeights) > 0)
                        <tr>
                            @foreach ($hasilNormalWeights as $hasil)
                            <td>{{ number_format($hasil, 2) }}</td>
                            @endforeach
                        </tr>
                        @else
                        <tr>
                            <td colspan="{{ count($BobotColumns) }}">Tidak ada data bobot normalisasi yang tersedia.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>

                <h5>Hasil Vektor S</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Vektor S</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($S) && is_array($S) && count($S) > 0)
                        @foreach ($S as $index => $value)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $produks[$index]->nama }}</td>
                            <td>{{ number_format($value, 4) }}</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="3">Tidak ada data vektor S yang tersedia.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>

                <h5>Hasil Vektor V</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Vektor V</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($V) && is_array($V) && count($V) > 0)
                        @foreach ($V as $index => $value)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $produks[$index]->nama }}</td>
                            <td>{{ number_format($value, 4) }}</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="3">Tidak ada data vektor V yang tersedia.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
