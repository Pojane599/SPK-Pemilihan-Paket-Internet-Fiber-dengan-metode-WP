<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email</title>
</head>

<body style="font-family: Arial, sans-serif; line-height: 1.6;">

    <div style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f9f9f9;">
        <div style="background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
            <h1 style="text-align: center; font-size: 24px; color: #333; margin-bottom: 20px;">Halo, <strong>{{ $name }}</strong></h1>
            <p style="font-size: 16px; color: #666;">Terima kasih telah mendaftar. Silakan klik tombol di bawah ini untuk verifikasi email Anda:</p>
            <p style="text-align: center; margin-top: 30px;">
                <a href="{{ $verificationUrl }}" style="display: inline-block; background-color: #007bff; color: #ffffff; text-decoration: none; padding: 12px 20px; border-radius: 4px;">Verifikasi Email</a>
            </p>
            <p style="font-size: 14px; color: #999; margin-top: 20px;">Jika Anda tidak bisa mengklik tombol di atas, silakan salin dan tempel URL berikut di browser Anda:</p>
            <p style="font-size: 14px; color: #999; text-align: center; margin-top: 10px;">{{ $verificationUrl }}</p>
        </div>
    </div>

</body>

</html>
