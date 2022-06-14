<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Halo Pimpinan {{ $order->user->fasyankes_name }} <br>
    Berikut terlampir surat penawaran atas order yang telah dilakukan pihak {{ $order->user->fasyankes_name }}
    pada tanggal {{ $order->created_at }} dengan <br>
    Nomor Order : {{ $order->number }} <br>
</body>
</html>