<footer id="footer" class="footer">
  <div class="container footer-top">
    <div class="row gy-4">
      <div class="col-lg-4 col-md-6 footer-about">
        <a href="{{ route('user.home') }}" class="d-flex align-items-center">
          <img src="{{ asset('AdminLTE/dist/img/logo.png') }}" alt="Logo" class="logo" style="height: 40px; width: 45px">
          <span class="sitename">FIBERPICK</span>
        </a>
        <div class="footer-contact pt-3">
          <p>Tegal, Jawa Tengah</p>
          <p>Indonesia</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-3 footer-links">
        <h4>Link</h4>
        <ul>
          <li><i class="bi bi-chevron-right"></i> <a href="{{ route('user.home') }}">Beranda</a></li>
          <li><i class="bi bi-chevron-right"></i> <a href="{{ route('user.provider') }}">Provider</a></li>
          <li><i class="bi bi-chevron-right"></i> <a href="{{ route('user.rekomendasi') }}">Rekomendasi</a></li>
          <li><i class="bi bi-chevron-right"></i> <a href="{{ route('user.pesan') }}">Kontak</a></li>
        </ul>
      </div>

      <div class="col-lg-4 col-md-12">
        <h4>Follow Media Sosial</h4>
        <p>Silahkan follow media sosial media saya untuk melihat update terkait website ini</p>
        <div class="social-links d-flex">
          <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
          <a href="https://www.facebook.com/alex.cuk.98?mibextid=ZbWKwL" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="https://www.instagram.com/pojan599/?utm_source=ig_web_button_share_sheet" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="https://www.linkedin.com/in/fauzan-dzika-80a6a9255?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>

    </div>
  </div>

  <div class="container copyright text-center mt-4">
    <p>© <span>Copyright</span> <strong class="px-1 sitename">FIBERPICK!</strong> <span>All Rights Reserved</span></p>
    <div class="credits">
      Designed by <a href="https://www.linkedin.com/in/fauzan-dzika-80a6a9255?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app">Fauzan Dzika</a>
    </div>
  </div>

</footer>