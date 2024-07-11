<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lupa Password | FIBERPICK</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
    <link href="{{ asset('AdminLTE/dist/img/logo.png') }}" rel="icon">
    <!-- SweetAlert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        body, html {
            height: 100%;
            margin: 0;
            background-color: white;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            
        }

        .login-box {
            width: 360px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
        }

        .login-box .login-header {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="container">
        <div class="login-box bg-transparent">
            <div class="login-header">
                <a href="{{ route('login') }}" class="h1"><b>FIBER</b>PICK</a>
            </div>
            <p class="login-box-msg">Masukkan E-Mail kamu yang terdaftar</p>

            <form action="{{ route('forgot-password-act') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @error('email')
                <small>{{ $message }}</small>
                @enderror
                <div class="row">
                    <div class="col-12 mb-2">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                    <div class="col-12">
                        <a href="{{ route('login') }}" class="btn btn-block btn-secondary">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if ($message = Session::get('success'))
    <script>
        Swal.fire('{{ $message }}');
    </script>
    @endif

    @if ($message = Session::get('failed'))
    <script>
        Swal.fire('{{ $message }}');
    </script>
    @endif
</body>

</html>