<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    *{
        margin: 0px;
        padding: 0px;
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
</style>
<body style="padding: 30px 50px">
    <div style="vertical-align: middle">
        <span style="display: inline-block; width: 120px">
            Lampiran Surat
        </span>
        : 123
    </div>
    <div style="vertical-align: middle">
        <span style="display: inline-block; width: 120px">
            Tanggal
        </span>
        : {{ FormatHelper::toIndonesianDateFormat(date('Y-m-d')) }}
    </div>

    {{-- Tabel Alat --}}
    <div>
        <div style="text-align: center; margin-top: 30px">
            <p>
                Daftar Alat yang Dikalibrasi di {{ $order->user->fasyenkes_name }} ({{ $order->number }})
            </p>
            <table class="border-table" style="width: 100%; margin-top: 10px">
                <tr>
                    <td class="text-center">
                        <b>No.</b>
                    </td>
                    <td class="text-center">
                        <b>Nama Alat</b>
                    </td>
                    <td class="text-center">
                        <b>Jumlah</b>
                    </td>
                    <td class="text-center">
                        <b>Tarif (Rp.)</b>
                    </td>
                    <td class="text-center">
                        <b>Total Biaya (Rp.)</b>
                    </td>
                </tr>
                <?php 
                    $num = 1;
                    $total_payment = 0; 
                    $total_ammount = 0;
                ?>
                @foreach ($alkesOrders as $alkes => $value)
                    <tr>
                        <td class="text-center">{{ $num }}</td>
                        <td>{{ $alkes }}</td>
                        <td class="text-center">{{ $value['ammount'] }}</td>
                        <td class="text-right">{{ FormatHelper::toIndonesianCurrencyFormat($value['price']) }}</td>
                        <td class="text-right">{{ FormatHelper::toIndonesianCurrencyFormat($value['price'] * $value['ammount']) }}</td>
                    </tr>
                    <?php 
                        $num++; 
                        $total_ammount += $value['ammount'];
                        $total_payment += ($value['price'] * $value['ammount']);
                    ?>
                @endforeach
                <tr>
                    <td colspan="2" class="text-center">
                        <b>Total</b>
                    </td>
                    <td class="text-center">
                        <b>{{ $total_ammount }}</b>
                    </td>
                    <td class="text-right" colspan="2">
                        <b>
                            {{ FormatHelper::toIndonesianCurrencyFormat($total_payment) }}
                        </b>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" class="text-center">
                        <b>
                            (Terbilang : {{ FormatHelper::toIndonesianCurrencyStringFormat($total_payment) }})
                        </b>
                    </td>
                </tr>
            </table>
        </div>
    
        <div style="width: 100%" class="text-right">
            <div class="text-center" style="width: 200px; display: inline-block; margin-top: 16px">
                <p>
                    Kepala LPFK Banjarbaru
                </p>
                <img src="{{ asset('digital_sign/Yuni_Irmawati_Digital_Sign.jpg') }}" style="width: 100px; margin-top: 6px">
            </div>
        </div>
    </div>

    <div>
        <p>
            Rincian Biaya Petugas Klinik Mitra Sehat
        </p>
        <table class="border-table" style="width: 100%; margin-top: 16px">
            <tr>
                <td class="text-center" style="width: 30px">No.</td>
                <td class="text-center">Deskripsi Biaya</td>
                <td class="text-center">Tarif (Rp.)</td>
            </tr>
            <tr>
                <td class="text-center">1</td>
                <td>
                    Biaya Petugas
                </td>
                <td class="text-right">
                    {{ FormatHelper::toIndonesianCurrencyFormat($order->daily_accommodation) }}
                </td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td>
                    Biaya Transport & Akomodasi
                </td>
                <td class="text-right">
                    {{ FormatHelper::toIndonesianCurrencyFormat($order->accommodation) }}
                </td>
            </tr>
            <tr>
                <td class="text-center" colspan="2">
                    <b>
                        Sub Total
                    </b>
                </td>
                <td class="text-right">
                    {{ FormatHelper::toIndonesianCurrencyFormat($order->daily_accommodation + $order->accommodation) }}
                </td>
            </tr>
            <tr>
                <td colspan="3" class="text-center">
                    (Terbilang : {{ FormatHelper::toIndonesianCurrencyStringFormat($order->daily_accommodation + $order->accommodation) }})
                </td>
            </tr>
        </table>
    </div>
</body>
</html>