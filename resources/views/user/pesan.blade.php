<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Pesan | FIBERPICK!</title>

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
        @include('user.partials.hero-section')
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Kontak</h2>
                <p>Silahkan masukkan feedback anda mengenai website ini</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-5">

                        <div class="info-wrap">
                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                                <i class="bi bi-geo-alt flex-shrink-0"></i>
                                <div>
                                    <h3>Alamat</h3>
                                    <p>Kota Tegal, Jawa Tengah</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                                <i class="bi bi-telephone flex-shrink-0"></i>
                                <div>
                                    <h3>Telepon Kami</h3>
                                    <p>+62877-7137-3110</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                                <i class="bi bi-envelope flex-shrink-0"></i>
                                <div>
                                    <h3>Email Kami</h3>
                                    <p>admin@gmail.com</p>
                                </div>
                            </div><!-- End Info Item -->
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.1849162649823!2d109.10501200968706!3d-6.868432493101557!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6fb9e2805c1c1b%3A0xe3e61e1ae59106ff!2sPoliteknik%20Harapan%20Bersama!5e0!3m2!1sen!2sid!4v1718781819686!5m2!1sen!2sid" frameborder="0" style="border:0; width: 100%; height: 400px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <form action="{{ route('pesan.kirim') }}" method="POST" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                            @csrf
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <label for="name-field" class="pb-2">Nama Anda</label>
                                    <input type="text" name="name" id="name-field" class="form-control" value="{{ auth()->user()->name }}" readonly>
                                </div>

                                <div class="col-md-6">
                                    <label for="email-field" class="pb-2">Email Anda</label>
                                    <input type="email" class="form-control" name="email" id="email-field" value="{{ auth()->user()->email }}" readonly>
                                </div>

                                <div class="col-md-12">
                                    <label for="subject-field" class="pb-2">Subjek</label>
                                    <input type="text" class="form-control" name="subject" id="subject-field" required>
                                </div>

                                <div class="col-md-12">
                                    <label for="kategori-field" class="pb-2">Kategori</label>
                                    <select class="form-control" id="kategori-field" name="kategori" required>
                                        <option value="" disabled selected>--- Pilih Kategori ---</option>
                                        <option value="Bugs / Error">Bugs / Error</option>
                                        <option value="Pertanyaan Umum">Pertanyaan Umum</option>
                                        <option value="Saran / Usulan">Saran / Usulan</option>
                                        <option value="Pujian">Pujian</option>
                                        <option value="Keluhan">Keluhan</option>
                                        <option value="Permintaan Fitur">Permintaan Fitur</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <label for="message-field" class="pb-2">Pesan</label>
                                    <textarea class="form-control" name="message" rows="10" id="message-field" required></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Memuat</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Pesan Anda telah dikirim. Terima kasih!</div>

                                    <button type="submit">Kirim Pesan</button>
                                </div>

                            </div>
                        </form>

                    </div><!-- End Contact Form -->

                </div>

            </div>

        </section>

    </main>
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Main JS File -->
    <script src="{{ asset('AdminLTE/dist/js/main.js') }}"></script>

    @if ($message = Session::get('succes'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ $message }}',
            confirmButtonText: 'OK'
        });
    </script>
    @endif

    @if ($message = Session::get('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: '{{ $message }}',
            confirmButtonText: 'OK'
        });
    </script>
    @endif

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