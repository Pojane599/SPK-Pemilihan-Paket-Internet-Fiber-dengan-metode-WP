<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Penyedia | FIBERPICK</title>

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
    <link href="{{ asset('AdminLTE/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('AdminLTE/plugins/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('AdminLTE/plugins/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('AdminLTE/plugins/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('AdminLTE/plugins/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('AdminLTE/dist/css/main.css') }}" rel="stylesheet">
</head>

<body class="index-page">
    @include('user.navbar')

    <main class="main">
        @include('user.partials.hero-provider')

        <!-- /Clients Section -->
        <section class="indihome section" id="indihome">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-4 text-center">
                        <div class="col-img" data-aos="zoom-in">
                            <img src="../AdminLTE/dist/img/clients/Indihome.png" alt="Indihome Logo" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="content">
                            <h2 class="section-title" data-aos="fade-up" data-aos-delay="200">IndiHome - Penyedia Jaringan Optik Fiber Yang Andal</h2>
                            <p class="section-description" data-aos="fade-up" data-aos-delay="400">IndiHome menawarkan internet berkecepatan tinggi, TV kabel, dan layanan telepon melalui jaringan optik fiber canggih mereka. Rasakan konektivitas yang lancar dengan beragam paket yang disesuaikan untuk memenuhi kebutuhan Anda.</p>
                            <ul class="features-list" data-aos="fade-up" data-aos-delay="600">
                                <li>Internet berkecepatan tinggi hingga 100 Mbps</li>
                                <li>Penggunaan data tanpa batas</li>
                                <li>Layanan TV interaktif dengan beragam saluran</li>
                                <li>Dukungan pelanggan yang andal</li>
                            </ul>
                            <a href="https://indihome.co.id" class="btn btn-primary">Pelajari Lebih Lanjut</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section linknet" id="linknet" data-builder="section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-8">
                        <div class="content">
                            <h2 class="section-title" data-aos="fade-up">LinkNet - Internet Optik Fiber Berkecepatan Tinggi</h2>
                            <p class="section-description" data-aos="fade-up" data-aos-delay="200">LinkNet menyediakan internet super cepat, TV digital, dan layanan telekomunikasi menggunakan teknologi optik fiber canggih mereka. Temukan beragam paket yang dirancang untuk memenuhi kebutuhan spesifik Anda.</p>
                            <ul class="features-list" data-aos="fade-up" data-aos-delay="400">
                                <li>Kecepatan internet super cepat hingga 1 Gbps</li>
                                <li>Rencana data komprehensif</li>
                                <li>Saluran TV digital berkualitas tinggi</li>
                                <li>Dukungan pelanggan 24/7</li>
                            </ul>
                            <a href="https://linknet.co.id" class="btn btn-primary">Pelajari Lebih Lanjut</a>
                        </div>
                    </div>
                    <div class="col-xl-4 text-center">
                        <div class="col-img" data-aos="zoom-in">
                            <img src="../AdminLTE/dist/img/clients/LinkNet.png" alt="LinkNet Logo" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="mnc-play section" id="mnc-play" data-builder="section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-4 text-center">
                        <div class="col-img" data-aos="zoom-in">
                            <img src="../AdminLTE/dist/img/clients/mnc.png" alt="MNC Play Logo" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="content">
                            <h2 class="section-title" data-aos="fade-up">MNC Play - Pengalaman Fiber Optik Ultimat</h2>
                            <p class="section-description" data-aos="fade-up" data-aos-delay="200">MNC Play menyediakan internet berkecepatan tinggi, TV interaktif, dan layanan telepon yang andal melalui jaringan optik fiber canggih mereka. Nikmati pengalaman digital yang mulus dan superior dengan berbagai paket yang bisa Anda pilih.</p>
                            <ul class="features-list" data-aos="fade-up" data-aos-delay="400">
                                <li>Internet berkecepatan tinggi hingga 1 Gbps</li>
                                <li>Rencana data tanpa batas</li>
                                <li>TV interaktif dengan berbagai pilihan saluran</li>
                                <li>Dukungan pelanggan 24/7</li>
                            </ul>
                            <a href="https://mncplay.id" class="btn btn-primary">Pelajari Lebih Lanjut</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('user.partials.call-to-action')

        <section class="section myrepublic" id="myrepublic" data-builder="section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-8">
                        <div class="content">
                            <h2 class="section-title" data-aos="fade-up">MyRepublic - Mengejawantahkan Broadband Fiber</h2>
                            <p class="section-description" data-aos="fade-up" data-aos-delay="200">MyRepublic menawarkan internet super cepat, streaming tanpa masalah, dan layanan telekomunikasi komprehensif menggunakan teknologi optik fiber terkini. Pilih dari berbagai paket yang dirancang untuk memenuhi kebutuhan spesifik Anda dan nikmati pengalaman online yang tak tertandingi.</p>
                            <ul class="features-list" data-aos="fade-up" data-aos-delay="400">
                                <li>Kecepatan internet hingga 1 Gbps</li>
                                <li>Data tanpa batas tanpa throttling</li>
                                <li>Streaming HD dan gaming dioptimalkan</li>
                                <li>Dukungan pelanggan 24/7</li>
                            </ul>
                            <a href="https://myrepublic.co.id" class="btn btn-primary">Pelajari Lebih Lanjut</a>
                        </div>
                    </div>
                    <div class="col-xl-4 text-center">
                        <div class="col-img" data-aos="zoom-in">
                            <img src="../AdminLTE/dist/img/clients/republic.png" alt="MyRepublic Logo" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="xlhome section" id="xlhome" data-builder="section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-4 text-center">
                        <div class="col-img" data-aos="zoom-in">
                            <img src="../AdminLTE/dist/img/clients/XL.png" alt="XL Home Logo" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="content">
                            <h2 class="section-title" data-aos="fade-up">XL Home - Broadband Fiber Tanpa Batas</h2>
                            <p class="section-description" data-aos="fade-up" data-aos-delay="200">XL Home menawarkan internet berkecepatan tinggi, IPTV, dan layanan telekomunikasi dengan jaringan optik fiber mereka yang canggih. Nikmati konektivitas yang lancar dan berbagai paket yang disesuaikan dengan kebutuhan Anda.</p>
                            <ul class="features-list" data-aos="fade-up" data-aos-delay="400">
                                <li>Internet berkecepatan tinggi hingga 1 Gbps</li>
                                <li>Penggunaan data tanpa batas</li>
                                <li>IPTV dengan beragam pilihan saluran</li>
                                <li>Dukungan pelanggan 24/7</li>
                            </ul>
                            <a href="https://xlhome.co.id" class="btn btn-primary">Pelajari Lebih Lanjut</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section firstmedia" id="firstmedia" data-builder="section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-8">
                        <div class="content">
                            <h2 class="section-title" data-aos="fade-up">First Media - Rumah Digital Anda</h2>
                            <p class="section-description" data-aos="fade-up" data-aos-delay="200">First Media menyediakan internet berkecepatan tinggi, TV digital, dan layanan telepon rumah melalui jaringan optik fiber canggih mereka. Rasakan solusi digital lengkap dengan berbagai paket yang dirancang untuk memenuhi kebutuhan Anda.</p>
                            <ul class="features-list" data-aos="fade-up" data-aos-delay="400">
                                <li>Internet berkecepatan tinggi hingga 1 Gbps</li>
                                <li>Rencana data tanpa batas</li>
                                <li>TV digital dengan beragam pilihan saluran</li>
                                <li>Dukungan pelanggan 24/7</li>
                            </ul>
                            <a href="https://firstmedia.com" class="btn btn-primary">Pelajari Lebih Lanjut</a>
                        </div>
                    </div>
                    <div class="col-xl-4 text-center">
                        <div class="col-img" data-aos="zoom-in">
                            <img src="../AdminLTE/dist/img/clients/First.png" alt="First Media Logo" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="biznet section" id="biznet" data-builder="section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-4 text-center">
                        <div class="col-img" data-aos="zoom-in">
                            <img src="../AdminLTE/dist/img/clients/Biznet.png" alt="Biznet Logo" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="content">
                            <h2 class="section-title" data-aos="fade-up">Biznet - Infrastruktur Digital Terdepan</h2>
                            <p class="section-description" data-aos="fade-up" data-aos-delay="200">Biznet menawarkan internet ultra cepat, TV digital, dan layanan cloud menggunakan teknologi optik fiber terbaru. Pilih dari berbagai paket yang dirancang untuk memberikan solusi digital komprehensif untuk rumah atau bisnis Anda.</p>
                            <ul class="features-list" data-aos="fade-up" data-aos-delay="400">
                                <li>Kecepatan internet ultra cepat hingga 1 Gbps</li>
                                <li>Rencana data tanpa batas</li>
                                <li>TV digital dengan pilihan saluran yang beragam</li>
                                <li>Dukungan pelanggan 24/7</li>
                            </ul>
                            <a href="https://biznetnetworks.com" class="btn btn-primary">Pelajari Lebih Lanjut</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('user.footer')

    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>
    <!-- @include('user.footer') -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/plugins/php-email-form/validate.js') }}"></script>
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
