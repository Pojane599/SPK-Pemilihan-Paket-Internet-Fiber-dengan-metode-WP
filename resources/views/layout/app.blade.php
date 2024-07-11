<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | FIBERPICK</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ url('AdminLTE/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('AdminLTE/plugins/bootstrap/css/bootstrap.css') }}">
    <!-- Datatables -->
    <!-- <link rel="stylesheet" href="{{ url('AdminLTE/plugins/datatables-colreorder/css/colReorder.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('AdminLTE/plugins/datatables-searchbuilder/css/searchBuilder.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('AdminLTE/plugins/datatables-searchpanes/css/searchPanes.bootstrap4.min.css') }}"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap4.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('AdminLTE/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link href="{{ asset('AdminLTE/dist/img/logo.png') }}" rel="icon">

</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        @include('layout.navbar')
        @include('layout.sidebar')
        @yield('content')
        @include('layout.footer')
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ url('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- datatables -->
    <!-- <script src="{{ url('AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('AdminLTE/plugins/datatables-searchbuilder/js/searchBuilder.bootstrap4.min.js') }}"></script>
    <script src="{{ url('AdminLTE/plugins/datatables-searchpanes/js/searchPanes.bootstrap4.min.js') }}"></script>
    <script src="{{ url('AdminLTE/plugins/datatables-colreorder/js/colReorder.bootstrap4.min.js') }}"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap4.js"></script>
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('AdminLTE/dist/js/adminlte.min.js') }}"></script>
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
            $('#example1').DataTable({
                searching: true,
                ordering: true,
                paging: true
            });
        });
        $(document).ready(function() {
            $('#example2').DataTable({
                searching: true,
                ordering: true,
                paging: true
            });
        });
    </script>
    <script>
        function updateDateTime() {
            var now = new Date();

            // Format tanggal
            var optionsDate = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            var formattedDate = now.toLocaleDateString('id-ID', optionsDate);

            // Format waktu
            var optionsTime = {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false
            };
            var formattedTime = now.toLocaleTimeString('id-ID', optionsTime);

            // Update elemen HTML
            document.getElementById('date').innerText = formattedDate;
            document.getElementById('time').innerText = formattedTime;
        }

        setInterval(updateDateTime, 1000); // Update every second
        updateDateTime(); // Initial call to set the date and time immediately
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    document.getElementById('statusForm').submit();
                });
            });
        });
    </script>

    <script>
        // Format input harga saat mengetik
        $(document).ready(function() {
            // Select input dengan class 'harga'
            $('.harga').on('input', function() {
                // Hilangkan semua karakter selain digit
                var nilai = $(this).val().replace(/\D/g, '');
                // Format nilai dengan menggunakan toLocaleString() untuk format IDR
                $(this).val((parseInt(nilai)).toLocaleString('id-ID'));
            });
        });
    </script>

</body>

</html>