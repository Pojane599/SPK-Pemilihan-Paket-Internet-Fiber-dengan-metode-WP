<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <link rel="stylesheet" href="../AdminLTE/dist/css/login.css">
  <link rel="icon" href="{{ asset('AdminLTE/dist/img/logo.png') }}">
  <title>Login Page | FIBERPICK</title>
</head>

<body>

  <div class="container" id="container" style="overflow-y: hidden;">
    <div class="form-container sign-up">
      <form action="{{ route('register-proses') }}" method="post" enctype="multipart/form-data">
        @csrf
        <h1>Buat Akun</h1>
        <span>Silahkan buat akun & cek email setelah registrasi</span>
        <input type="text" name="nama" class="form-control" placeholder="Full name">
        @error('nama')
        <small class="text-danger">{{ $message }}</small>
        @enderror
        <input type="email" name="email" class="form-control" placeholder="Email">
        @error('email')
        <small class="text-danger">{{ $message }}</small>
        @enderror
        <input type="password" name="password" class="form-control" placeholder="Password">
        @error('password')
        <small class="text-danger">{{ $message }}</small>
        @enderror
        <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
        <button type="submit" class="btn btn-primary btn-block">Registrasi</button>
      </form>
    </div>
    <div class="form-container sign-in">
      <form action="{{ route('login-proses') }}" method="post">
        @csrf
        <h1>Masuk</h1>
        <div class="social-icons">
          <a href="{{ route('login.google') }}" class="icon-google"><i class="fa-brands fa-google-plus-g"></i></a>
          <a href="{{ route('login.facebook') }}" class="icon-facebook"><i class="fa-brands fa-facebook-f"></i></a>
        </div>
        <span>Atau bisa gunakan email dan password</span>
        <input type="email" name="email" class="form-control" placeholder="Email">
        @error('email')
        <small class="text-danger">{{ $message }}</small>
        @enderror
        <input type="password" name="password" class="form-control" placeholder="Password">
        @error('password')
        <small class="text-danger">{{ $message }}</small>
        @enderror
        <a href="{{ route('forgot-password') }}">Lupa Password?</a>
        <button type="submit" class="btn btn-block">Masuk</button>
      </form>
    </div>
    <div class="toggle-container">
      <div class="toggle">
        <div class="toggle-panel toggle-left">
          <img src="{{ asset('AdminLTE/dist/img/logo.png') }}" alt="Logo">
          <h1>Selamat Datang Kembali!</h1>
          <p>Buat akun baru lalu nikmati website ini</p>
          <button class="hidden" id="login">Sign In</button>
        </div>
        <div class="toggle-panel toggle-right">
          <img src="{{ asset('AdminLTE/dist/img/logo.png') }}" alt="Logo">
          <h1>Hallo, Kawan!</h1>
          <p>Masuk dan Nikmati Website ini</p>
          <button class="hidden" id="register">Sign Up</button>
        </div>
      </div>
    </div>
  </div>

  <script src="../AdminLTE/dist/js/login.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  @if ($message = Session::get('succes'))
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Login Berhasil!',
      text: '{{ $message }}',
      confirmButtonText: 'OK',
      scrollOnTop: false,
      didOpen: () => {
        document.body.classList.add('modal-open');
      },
      willClose: () => {
        document.body.classList.remove('modal-open');
      }
    });
  </script>
  @endif

  @if ($message = Session::get('failed'))
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Login Gagal',
      text: '{{ $message }}',
      confirmButtonText: 'OK',
      scrollOnTop: false,
      didOpen: () => {
        document.body.classList.add('modal-open');
      },
      willClose: () => {
        document.body.classList.remove('modal-open');
      }
    });
  </script>
  @endif
</body>

</html>