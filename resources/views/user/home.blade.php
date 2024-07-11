<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Beranda | FIBERPICK</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
  <link href="{{ asset('AdminLTE/dist/img/logo.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

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

    <div id="preloader"></div>
    <!-- Hero Section -->
    @include('user.partials.hero-section')

    <!-- About Section -->
    <section class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Apa itu Sistem Pendukung Keputusan<br> Pemilihan Paket Internet Fiber?</h2>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">
          <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
            <p>Selamat datang di Sistem Pendukung Keputusan Pemilihan Paket Internet Fiber (FIBERPICK)! Kami adalah tim pengembang yang berdedikasi untuk membantu para pengguna internet dalam memilih paket internet fiber yang paling sesuai dengan kebutuhan mereka.</p>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <h5 class="text-center"><strong>Visi</strong></h5>
            <p style="text-align: justify;">Visi kami adalah menjadi solusi terdepan dalam membantu masyarakat memilih paket internet fiber terbaik yang sesuai dengan kebutuhan dan preferensi mereka melalui analisis data yang cerdas dan akurat. Kami berambisi untuk menghadirkan pengalaman yang revolusioner dalam memilih layanan internet, yang tidak hanya memenuhi kebutuhan dasar, tetapi juga memberikan kepuasan dan kemudahan yang tak tertandingi bagi setiap pengguna kami. Kami bermimpi untuk menciptakan lingkungan digital yang lebih terhubung dan inklusif dengan memberikan akses yang mudah dan layanan yang dapat diandalkan kepada semua orang, di mana pun mereka berada.</p>
            <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
          </div>

          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="300">
            <h5 class="text-center"><strong>Misi</strong></h5>
            <ul>
              <li><i class="bi bi-check2-circle"></i> <span>Mengembangkan sistem yang intuitif dan mudah digunakan untuk semua kalangan masyarakat dalam memilih paket internet fiber.</span></li>
              <li><i class="bi bi-check2-circle"></i> <span>Menyediakan informasi yang lengkap, akurat, dan up-to-date mengenai berbagai paket internet fiber dari berbagai penyedia layanan.</span></li>
              <li><i class="bi bi-check2-circle"></i> <span>Menerapkan metode analisis data yang canggih untuk memberikan rekomendasi yang sesuai dengan kebutuhan dan preferensi individu pengguna.</span></li>
              <li><i class="bi bi-check2-circle"></i> <span>Terus meningkatkan dan memperbarui sistem berdasarkan umpan balik pengguna dan perkembangan teknologi untuk memberikan layanan yang lebih baik dan relevan.</span></li>
            </ul>
          </div>
        </div>
      </div>
    </section>


    <!-- Why Us Section -->
    <section id="why-us" class="section why-us" data-builder="section">
      <div class="container-fluid">
        <div class="row gy-4">
          <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">
            <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
              <h3><span>Mengapa Memilih Kami? </span><strong>Dalam Pemilihan Paket Internet Fiber</strong></h3>
              <p>Terima kasih telah mempercayai Sistem Pendukung Keputusan Pemilihan Paket Internet Fiber (FIBERPICK) kami. Kami berharap dapat membantu Anda menemukan paket internet fiber yang sesuai dengan kebutuhan Anda!</p>
            </div>
            <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">
              <div class="faq-item faq-active">
                <h3><span>01</span> Data Terbaru dan Akurat</h3>
                <div class="faq-content">
                  <p>Kami selalu memperbarui informasi kami berdasarkan penawaran terbaru dan perkembangan dalam layanan internet.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div>
              <div class="faq-item">
                <h3><span>02</span> Pendekatan yang Terpersonalisasi</h3>
                <div class="faq-content">
                  <p>Kami memahami bahwa setiap pengguna memiliki kebutuhan yang berbeda-beda, oleh karena itu rekomendasi kami disesuaikan dengan preferensi masing-masing individu.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div>
              <div class="faq-item">
                <h3><span>03</span> Tim Berpengalaman</h3>
                <div class="faq-content">
                  <p>Tim kami terdiri dari ahli teknologi dan analis data yang berpengalaman dalam industri telekomunikasi, menjamin bahwa setiap rekomendasi yang kami berikan adalah yang terbaik untuk Anda.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-5 order-1 order-lg-2 why-us-img">
            <img src="../AdminLTE/dist/img/why-us.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="100">
          </div>
        </div>

      </div>

    </section><!-- /Why Us Section -->


    <!-- Call To Action Section -->
    @include('user.partials.call-to-action')

  </main>

  @include('user.footer')

  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
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
</body>

</html>