<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
            padding-left: 20px;
            padding-right: 20px;
            padding-top: 20px;
            padding-bottom: 40px;
        }
        .text-center{
            text-align: center;
        }
        .text-right{
            text-align: right;
        }
        .text-left{
            text-align: left;
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
        .border-table td{
            padding-left: 6px;
            padding-right: 6px;
        }
        .non-border-table, .non-border-table th, .non-border-table td{
            border: 0px solid transparent;
            border-collapse: collapse;
        }
        footer {
                position: fixed;
                left: 0;
                bottom: 0;
                margin-bottom: 20px;
                width: 100%;
            }
    </style>
</head>
<body>
    <table style="width: 100%" class="border-table">
        <tr>
            {{-- Header Kementrian Kesehatan Republik Indonesia --}}
            <td colspan="5" rowspan="3" style="padding-top: 2px; padding-bottom: 2px">
                <table style="width: 100%;" class="text-center non-border-table">
                    <tr>
                        <td style="width: 17%" class="text-right">
                            <img src="{{ asset('img/logo/kemenkes.jpg') }}" style="width: 50px">
                        </td>
                        <td style="width: auto">
                            <p style="font-size: 13px; font-weight: 700; margin: 0px; line-height: 1.1" class="text-center">KEMENTERIAN KESEHATAN REPUBLIK INDONESIA</p>
                            <p style="font-size: 10px; font-weight: 700; margin: 0px; line-height: 1.1" class="text-center">DIREKTORAT JENDERAL PELAYANAN KESEHATAN</p>
                            <p style="font-size: 10px; font-weight: 700; margin: 0px; line-height: 1.1" class="text-center">LOKA PENGAMANAN FASILITAS KESEHATAN BANJARBARU</p>
                            <p style="font-size: 6px; margin: 0px; line-height: 1.1" class="text-center">Jln. Banua Praja Utara RT. 03, RW. 04, Kel. Cempaka, Kec. Cempaka, Banjarbaru Kode Pos 70732</p>
                            <p style="font-size: 6px; margin: 0px; line-height: 1.1" class="text-center">Telp./Fax : 0511 - 5915674; No Layanan : 0831-50809115</p>
                            <p style="font-size: 6px; margin: 0px; line-height: 1.1" class="text-center">Pos-el : lpfk_banjarbaru@yahoo.co.id; lpfkbanjarbaru@gmail.com </p>
                            <p style="font-size: 6px; margin: 0px; line-height: 1.1" class="text-center">Website : bpfk-banjarbaru.org</p>
                        </td>
                        <td style="width: 17%;" class="text-left">
                            <img src="{{ asset('img/logo/logo.jpg') }}" style="width: 50px">
                        </td>
                    </tr>
                </table>
            </td>
            {{-- Judul Bukti Penerimaan pekerjaan --}}
            <td colspan="5" class="text-center">
                <b style="font-size: 13px">
                    BUKTI PENERIMAAN PEKERJAAN KALIBRASI ALAT KESEHATAN
                </b>
            </td>
        </tr>
        <tr>
            {{-- Nomor Order --}}
            <td colspan="3">
                Nomor Order : {{ $order->number }}
            </td>
            {{-- Tanggal Terima --}}
            <td colspan="2">
                Tanggal Terima : {{ FormatHelper::toIndonesianDateFormat($order->receive_date) }}
            </td>
        </tr>
        <tr>
            {{-- Tanggal Estimasi Selesai --}}
            <td colspan="5">
                Pekerjaan diperkirakan selesai tanggal : {{ FormatHelper::toIndonesianDateFormat($order->done_estimation_date) }}
            </td>
        </tr>
        <tr>
            {{-- Identitas Fasyankes --}}
            <td colspan="5" style="padding-top: 2px; padding-bottom: 2px">
                <table style="width: 100%" class="non-border-table">
                    <tr>
                        <td style="width: 30%; font-size: 11px">Pemilik Barang</td>
                        <td style="width: 1%; font-size: 11px">:</td>
                        <td style="font-size: 11px">
                            {{ $order->user->fasyankes_name }}
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 30%; font-size: 11px">Alamat</td>
                        <td style="width: 1%; font-size: 11px">:</td>
                        <td style="font-size: 11px">
                            {{ $order->user->address }}
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 30%; font-size: 11px">Telepon/Faksimili</td>
                        <td style="width: 1%; font-size: 11px">:</td>
                        <td style="font-size: 11px">
                            {{ $order->contact_person_phone }}
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 30%; font-size: 11px">Contact Person</td>
                        <td style="width: 1%; font-size: 11px">:</td>
                        <td style="font-size: 11px">
                            {{ $order->contact_person_name }}
                        </td>
                    </tr>
                </table>
            </td>
            {{-- TTD  --}}
            <td colspan="5">
                <table style="width: 100%" class="non-border-table">
                    <tr>
                        <td style="width: 50%; font-size: 11px" class="text-center">
                            Yang Menyerahkan Barang
                            <br>
                            <br>
                            <br>
                            {{ $order->contact_person_name }}
                        </td>
                        <td style="width: 50%; padding-top: 5px; padding-bottom: 5px" class="text-center">
                            <img style="width: 70px" src="data:image/png;base64,{{ DNS2D::getBarcodePNG("Penerima : {$order->alkes_receiver},\nPengecek : {$order->alkes_checker}", 'QRCODE') }}" alt="barcode"/>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        {{-- Tabel Alkes --}}
        <tr>
            <td rowspan="2" class="text-center" style="font-size: 11px; width: 2%">No</td>
            <td rowspan="2" class="text-center" style="font-size: 11px; width: 18%">Nama Alat</td>
            <td rowspan="2" class="text-center" style="font-size: 11px; width: 10%">Merek</td>
            <td rowspan="2" class="text-center" style="font-size: 11px; width: 10%">Model/Type</td>
            <td rowspan="2" class="text-center" style="font-size: 11px; width: 10%">No. Seri</td>

            <td rowspan="2" class="text-center" style="font-size: 11px; width: 4%">Jumlah</td>
            <td rowspan="2" class="text-center" style="font-size: 11px; width: 9%">Harga Satuan<br>(Rp.)</td>
            <td colspan="2" class="text-center" style="font-size: 11px">Pengecekan</td>
            <td rowspan="2" class="text-center" style="font-size: 11px; width: 13%">Keterangan</td>
        </tr>
        <tr>
            <td class="text-center" style="font-size: 11px; width: 5%">Fungsi</td>
            <td class="text-center" style="font-size: 11px; width: 14%">Aksesoris</td>
        </tr>
        <?php 
            $total_ammount = 0;
            $total_price = 0;
        ?>
        @foreach ($order->clean_alkes_orders as $index => $alkes_order)
            <tr>
                <td style="font-size: 11px" class="text-center">{{ $index + 1 }}</td>
                <td style="font-size: 11px">{{ $alkes_order['alkes'] }}</td>
                <td style="font-size: 11px">{{ $alkes_order['merk'] }}</td>
                <td style="font-size: 11px">{{ $alkes_order['model'] }}</td>
                <td style="font-size: 11px">{{ $alkes_order['series_number'] }}</td>
                <td style="font-size: 11px" class="text-center">{{ $alkes_order['ammount'] }}</td>
                <td style="font-size: 11px" class="text-right">{{ "Rp. " . FormatHelper::toIndonesianCurrencyFormat($alkes_order['price']) }}</td>
                <td style="font-size: 11px" class="text-center">{{ $alkes_order['function'] }}</td>
                <td style="font-size: 11px">{{ $alkes_order['accessories'] }}</td>
                <td style="font-size: 11px">{{ $alkes_order['admin_description'] }}</td>
            </tr>
            <?php 
                $total_ammount += $alkes_order['ammount'];
                $total_price += $alkes_order['price'];
            ?>
        @endforeach
        <tr>
            <td colspan="5">
                <b style="font-size: 11px">
                    Total
                </b>
            </td>
            <td style="font-size: 11px" class="text-center">
                {{ $total_ammount }}
            </td>
            <td class="text-right" style="font-size: 11px">
                {{ "Rp. " . FormatHelper::toIndonesianCurrencyFormat($total_price) }}
            </td>
            <td colspan="3"></td>
        </tr>

        <tr>
            {{-- Catatan --}}
            <td colspan="7" rowspan="9" style="vertical-align: top; font-size: 11px">
                Catatan : <br>
                {{ $order->receiver_description }}
            </td>
            <td colspan="2" style="font-size: 11px">Kaji Ulang Permintaan</td>
            <td class="text-center align-middle">
                <img src="{{ asset($order->review_request ? 'img/icon/check.png' : 'img/icon/false.png') }}" style="width: 12px">
            </td>
        </tr>
        <tr>
            <td colspan="2" style="font-size: 11px">Kemampuan Kalibrasi</td>
            <td class="text-center align-middle">
                <img src="{{ asset($order->calibration_ability ? 'img/icon/check.png' : 'img/icon/false.png') }}" style="width: 12px">
            </td>
        </tr>
        <tr>
            <td colspan="2" style="font-size: 11px">Kesiapan Petugas</td>
            <td class="text-center align-middle">
                <img src="{{ asset($order->officer_readiness ? 'img/icon/check.png' : 'img/icon/false.png') }}" style="width: 12px">
            </td>
        </tr>
        <tr>
            <td colspan="2" style="font-size: 11px">Beban Pekerjaan</td>
            <td class="text-center align-middle">
                <img src="{{ asset($order->workload ? 'img/icon/check.png' : 'img/icon/false.png') }}" style="width: 12px">
            </td>
        </tr>
        <tr>
            <td colspan="2" style="font-size: 11px">Kondisi Peralatan</td>
            <td class="text-center align-middle">
                <img src="{{ asset($order->equipment_condition ? 'img/icon/check.png' : 'img/icon/false.png') }}" style="width: 12px">
            </td>
        </tr>
        <tr>
            <td colspan="2" style="font-size: 11px">Kesesuaian metode Kalibrasi</td>
            <td class="text-center align-middle">
                <img src="{{ asset($order->review_request ? 'img/icon/check.png' : 'img/icon/false.png') }}" style="width: 12px">
            </td>
        </tr>
        <tr>
            <td colspan="2" style="font-size: 11px">Kesesuaian Metode Kalibrasi</td>
            <td class="text-center align-middle">
                <img src="{{ asset($order->calibration_method_compatibility ? 'img/icon/check.png' : 'img/icon/false.png') }}" style="width: 12px">
            </td>
        </tr>
        <tr>
            <td colspan="2" style="font-size: 11px">Akomodasi & Lingkungan</td>
            <td class="text-center align-middle">
                <img src="{{ asset($order->accommodation_and_environment ? 'img/icon/check.png' : 'img/icon/false.png') }}" style="width: 12px">
            </td>
        </tr>
        <tr>
            <td colspan="3" style="font-size: 11px">
                *) Ket : <img src="{{ asset('img/icon/check.png') }}" style="width: 12px; margin-right: 2px"> Memungkinkan <img src="{{ asset('img/icon/false.png') }}" style="width: 12px; margin-left: 5px"> Tidak Memungkinkan 
            </td>
        </tr>
        <tr>
            <td colspan="10">
            
            </td> 
        </tr>
    </table>

    <footer>
        <div style="margin-left: 10px; margin-right: 10px;">
            <table class="full-width">
                <tr>
                    <td style="width: 70px; vertical-align: top; font-size: 11px">
                        *Perhatian : 
                    </td>
                    <td style="width: auto">
                        <p style="line-height: 1; font-size: 10px">- Isi berita acara ini telah disetujui oleh pelanggan</p>
                        <p style="line-height: 1; font-size: 10px">- Data sertifikat akan diterbitkan sama dengan data yang ada pada berita acara ini</p>
                        <p style="line-height: 1; font-size: 10px">- Tidak dibenarkan memperbanyak, mengutip atau memiliki sebagian/keseluruhan isi dokumen ini tanpa izin dari LPFK Banjarbaru</p>
                    </td>
                </tr>
            </table>
        </div>
    </footer>
</body>
</html>