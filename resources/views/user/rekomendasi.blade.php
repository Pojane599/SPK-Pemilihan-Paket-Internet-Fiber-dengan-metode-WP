<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Rekomendasi | FIBERPICK!</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">

    <link href="{{ asset('AdminLTE/dist/img/logo.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/glightbox/css/glightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/swiper/swiper-bundle.min.css') }}">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/main.css') }}">
</head>

<body class="index-page">
    @include('user.navbar')
    <div id="preloader"></div>

    <main class="main">
        @include('user.partials.hero-rekomen')

        <section id="rekomendasi" class="section rekomendasi">
            <div class="container mt-4">
                <h2 class="text-center" data-aos="fade-up">Rekomendasi Provider</h2>
                <form method="POST" action="{{ route('user.addProduk') }}">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-md-8" data-aos="fade-up" data-aos-delay="300">
                            @if (isset($produk))
                            <select name="produk" id="character-select" class="form-control">
                                <option value="">Pilih Provider</option>
                                @foreach($produk as $produks)
                                <option value="{{ $produks->id }}">{{ $produks->nama }}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>
                        <div class="col-md-4" data-aos="fade-up" data-aos-delay="350">
                            <button type="submit" class="btn btn-success btn-block">Add</button>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered" id="character-table" data-aos="zoom-in" data-aos-delay="500">
                            <thead>
                                <tr>
                                    <th style="width: 100px;">No</th>
                                    <th style="width: 800px;">Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(session('produks', []) as $index => $produk)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $produk->nama }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('user.deleteProduk', $produk->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <p></p>
                    </div>
                    <div class="col-md-2 mt-2" data-aos="fade-up" data-aos-delay="700">
                        <button type="button" class="btn btn-secondary btn-block" data-bs-toggle="modal" data-bs-target="#modalPerhitungan">Hasil Perhitungan</button>
                    </div>
                    <div class="col-md-2 mt-2" data-aos="fade-up" data-aos-delay="700">
                        <button type="button" class="btn btn-secondary btn-block" data-bs-toggle="modal" data-bs-target="#modalForm">Pembobotan</button>
                    </div>
                    <div class="col-md-2 mt-2" data-aos="fade-up" data-aos-delay="700">
                        <form method="GET" action="{{ route('showPerhitunganWP') }}">
                            @csrf
                            <button type="submit" class="btn btn-success btn-block">Hasil</button>
                        </form>
                    </div>
                </div>
                @if (isset($hasilWP))
                <div class="row mt-4">
                    <div class="col-md-12">
                        <h4 class="text-bold">Hasil Perhitungan Weighted Product:</h4>
                        @foreach ($hasilWP as $hasil)
                        <p style="font-weight: 900;">RANK {{ $hasil['rank'] }}: <span style="font-weight: 400;">{{ $hasil['nama'] }}: {{ number_format($hasil['nilai'], 4) }}</span></p>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </section>
    </main>
    @include('user.partials.modal-pembobotan')
    @include('user.partials.modal-perhitungan')
    @include('user.footer')




    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>

    <script src="{{ asset('AdminLTE/plugins/aos/aos.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <!-- Main JS File -->
    <script src="{{ asset('AdminLTE/dist/js/main.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Ensure all modals are working correctly
            $('[data-bs-toggle="modal"]').click(function() {
                var target = $(this).data('bs-target');
                $(target).modal('show');
            });
            $('.btn-close').click(function() {
                $(this).closest('.modal').modal('hide');
            });
        });
    </script>

</body>

</html>