<!DOCTYPE html>
<html>
<head>
    <title>Verifikasi Email</title>
</head>
<body>
    <h1>Halo, {{ $name }}</h1>
    <p>Terima kasih telah mendaftar. Silakan klik link berikut untuk verifikasi email Anda:</p>
    <a href="{{ $verificationUrl }}">Verifikasi Email</a>
</body>
</html>
