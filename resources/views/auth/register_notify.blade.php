<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verifikasi Pendaftaran</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('vendor/stisla/css/style.css') }}">
  <link rel="icon" type="image/png" href="{{ asset('img/logo/logo.png') }}" />
</head>
<body>
    <div class="text-center" style="width: 100%; height: 100%; margin-top: 200px">
        <img src="{{ asset('img/icon/email.png') }}" alt="" style="width: 150px">
        <p class="mt-4">
            Silahkan memverifikasi pendaftaran akun anda terlebih dahulu, <br>
            Kami sudah mengirimkan link untuk mengonfirmasi akun anda ke {{ $email }},
        </p>
        <a href="https://mail.google.com/mail/" class="btn btn-primary btn-lg mt-2">Verifikasi Sekarang</a>
    </div>
</body>
</html>