<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{
            margin: 0px;
            padding: 0px;
            font-size: 12px;
            font-family: Arial, Helvetica, sans-serif;
            text-align: justify;
            line-height: 1.5;
        }
        body{
            padding-left: 35px;
            padding-right: 35px;
            padding-top: 30px;
            padding-bottom: 40px;
        }
        .text-center{
            text-align: center;
        }
        .text-right{
            text-align: right;
        }
        .border-table, .border-table th, .border-table td{
            border: 1px solid black;
            border-collapse: collapse;
        }
        .border-table th, .border-table td{
            padding-left: 4px;
            padding-right: 4px;
            padding-top: 1px;
            padding-bottom: 1px;
        }
        .price-cell{
            padding-right: 2px;
        }
    </style>
</head>
<body>
    <table style="width: 100%" class="border-table">
        <tr>
            <td colspan="4" class="text-center"><b>Rincian Biaya Akomodasi, Transportasi & Uang Harian</b></td>
        </tr>
        <tr>
            <td class="text-center" style="width: 20px">No.</td>
            <td class="text-center" style="width: 100px">Jenis</td>
            <td class="text-center">Keterangan</td>
            <td class="text-center" style="width: 100px">Jumlah (Rp.)</td>
        </tr>
        <tr>
            <td class="text-center">1</td>
            <td>Transportasi</td>
            <td>{{ $order->transportation_description }}</td>
            <td class="text-right">{{ FormatHelper::toIndonesianCurrencyFormat($order->transportation_accommodation) }}</td>
        </tr>
        <tr>
            <td class="text-center">2</td>
            <td>Penginapan</td>
            <td>{{ $order->lodging_description }}</td>
            <td class="text-right">{{ FormatHelper::toIndonesianCurrencyFormat($order->lodging_accommodation) }}</td>
        </tr>
        <tr>
            <td class="text-center">3</td>
            <td>Uang Harian</td>
            <td>{{ $order->daily_description }}</td>
            <td class="text-right">{{ FormatHelper::toIndonesianCurrencyFormat($order->daily_accommodation) }}</td>
        </tr>
        <tr>
            <td class="text-center">4</td>
            <td>Rapid Test</td>
            <td>{{ $order->rapid_test_description }}</td>
            <td class="text-right">{{ FormatHelper::toIndonesianCurrencyFormat($order->rapid_test_accommodation) }}</td>
        </tr>
        <tr>
            <td colspan="3"><b>Total</b></td>
            <td class="text-right"><b>Rp. {{ FormatHelper::toIndonesianCurrencyFormat($order->total_accommodation) }}</b></td>
        </tr>
    </table>
    {{ dd('ads') }}
</body>
</html>