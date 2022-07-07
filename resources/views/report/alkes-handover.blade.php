<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

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
        .align-middle{
            vertical-align: middle;
        }
        .border-table, .border-table th, .border-table td{
            border: 1px solid black;
            border-collapse: collapse;
        }
        .border-table{
            width: 100%;
        }
    </style>
</head>
<body>
    <table style="width: 100%">
        <tr>
            <td colspan="3">
                {{-- Header --}}
                <table style="width: 100%">
                    <tr>
                        <td style="width: 5%">
                            <img src="{{ asset('img/logo/kemenkes.jpg') }}" style="width: 85px">
                        </td>
                        <td style="width: 90%">
                            <p style="font-size: 21px; font-weight: 900" class="text-center">KEMENTERIAN KESEHATAN REPUBLIK INDONESIA</p>
                            <p style="font-size: 17px; font-weight: 900" class="text-center">DIREKTORAT JENDERAL PELAYANAN KESEHATAN</p>
                            <p style="font-size: 17px; font-weight: 900" class="text-center">LOKA PENGAMANAN FASILITAS KESEHATAN BANJARBARU</p>
                            <p style="font-size: 11px; margin-top: 5px" class="text-center">Jln. Banua Praja Utara RT. 03, RW. 04, Kel. Cempaka, Kec. Cempaka, Banjarbaru Kode Pos 70732</p>
                            <p style="font-size: 11px;" class="text-center">Telp./Fax : 0511 - 5915674; Pos-el : lpfk_banjarbaru@yahoo.co.id; lpfkbanjarbaru@gmail.com</p>
                            <p style="font-size: 11px;" class="text-center">Website : bpfk-banjarbaru.org</p>
                        </td>
                        <td style="width: 5%">
                            <img src="{{ asset('img/logo/logo.jpg') }}" style="width: 85px">
                        </td>
                    </tr>
                    {{-- Garis --}}
                    <tr>
                        <td colspan="3">
                            <div style="width: 100%; height: 2px; background-color: black; margin-top: 20px"></div>
                            <div style="width: 100%; height: 1px; background-color: black; margin-top: 2px"></div>
                        </td>
                    </tr>
                </table>

                {{-- Content --}}
                <div style="width: 100%; margin-top: 5px; border-style: solid; border-color: black; border-width: 1px;">
                    {{-- Title --}}
                    <table style="width: 100%">
                        <tr>
                            <td colspan="3" class="text-center" style="padding-top: 7px">
                                <p class="text-center" style="font-size: 13pt; font-weight: 900">
                                    BUKTI PENYERAHAN PEKERJAAN
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-top: 7px; padding-left: 15px;">
                                <table>
                                    <tr>
                                        <td style="width: 190px">
                                            Nomor Order
                                        </td>
                                        <td>
                                            : {{ $order->number }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Instansi Pemilik Barang
                                        </td>
                                        <td>
                                            : {{ $order->user->fasyankes_name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Tanggal Penyerahan
                                        </td>
                                        <td>
                                            : {{ FormatHelper::toIndonesianDateFormat(date('d-m-Y', strtotime(now()))) }}
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>

                    {{-- Tabel Order --}}
                    <table class="border-table" style="margin-top: 10px; padding-left: 15px; padding-right: 15px;">
                        <tr>
                            <td rowspan="2" class="text-center align-middle" style="width: 30px">
                                NO
                            </td>
                            <td rowspan="2" class="text-center align-middle">
                                NAMA ALAT
                            </td>
                            <td rowspan="2" class="text-center align-middle" style="width: 150px">
                                NO SERI
                            </td>
                            <td class="text-center align-middle">
                                JUMLAH
                            </td>
                            <td rowspan="2" class="text-center align-middle" style="width: 120px">
                                CATATAN
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center align-middle">
                                UNIT
                            </td>
                        </tr>
                        <?php
                            $totalAmmount = 0;  
                        ?>
                        @foreach ($order->clean_result_alkes_orders as $index => $alkesOrder)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td style="padding-left: 3px">{{ $alkesOrder['alkes'] }}</td>
                                <td style="padding-left: 3px">{{ $alkesOrder['series_number'] }}</td>
                                <td class="text-center">{{ $alkesOrder['ammount'] }}</td>
                                <td style="padding-left: 3px">{{ $alkesOrder['status_laik'] }}</td>
                                <?php
                                    $totalAmmount += $alkesOrder['ammount'];  
                                ?>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3" class="text-center">
                                Total
                            </td>
                            <td class="text-center" colspan="2">
                                {{ $totalAmmount }}
                            </td>
                        </tr>
                    </table>

                    <div style="margin-top: 10px; padding-left: 15px; padding-right: 15px;">
                        Catatan :
                        <table>
                            <tr>
                                <td style="border: 1px solid black; border-collapse: collapse; width: 30px" class="text-center">
                                    @if ($order->alkes_accordingly == '1')
                                        <img src="{{ asset('img/icon/check.png') }}" alt="" style="width: 15px">
                                    @endif
                                </td>
                                <td style="width: auto; padding-left: 3px">Diserahkan Alat/Barang sesuai dengan daftar di atas</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid black; border-collapse: collapse; width: 30px" class="text-center">
                                    @if ($order->certificate_handedover == '1')
                                        <img src="{{ asset('img/icon/check.png') }}" alt="" style="width: 15px">
                                    @endif
                                </td>
                                <td style="width: auto; padding-left: 3px">Diserahkan Sertifikat/Lembar Hasil Pengujian/Kalibrasi sesuai dengan daftar di atas</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid black; border-collapse: collapse; width: 30px" class="text-center">
                                    @if ($order->cancel_test == '1')
                                        <img src="{{ asset('img/icon/check.png') }}" alt="" style="width: 15px">
                                    @endif
                                </td>
                                <td style="width: auto; padding-left: 3px">Batal diuji/dikalibrasi (dalam keterangan)</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid black; border-collapse: collapse; width: 30px" class="text-center">
                                    @if ($order->alkes_checked == '1')
                                        <img src="{{ asset('img/icon/check.png') }}" alt="" style="width: 15px">
                                    @endif
                                </td>
                                <td style="width: auto; padding-left: 3px">Alat/Barang atau Dokumen sudah diperiksa oleh pelanggan</td>
                            </tr>
                        </table>
                    </div>

                    <table style="margin-top: 20px; width: 100%; margin-bottom: 10px">
                        <tr>
                            <td style="width: 70%" class="text-center">
                                <img src="data:image/png;base64,{{ DNS2D::getBarcodePNG(Auth::guard('admin')->user()->name, 'QRCODE') }}" alt="barcode"/>
                            </td>
                            <td style="width: auto" class="text-center">
                                Diterima Oleh <br> <br> <br>
                                {{ $order->contact_person_receiver_name ?? '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center" style="padding-top: 14px">
                                <p style="font-size: 7pt; font-style: italic" class="text-center">
                                    Tidak dibenarkan memperbanyak, mengutip atau memiliki sebagian/keseluruhan isi dokumen ini tanpa ijin dari LPFK Banjarbaru
                                </p>
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
        </tr>
    </table>
</body>
</html>