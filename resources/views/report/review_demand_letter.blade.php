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
    </style>
</head>
<body>
    <p style="font-size: 13px; text-align: center;"><b>KAJI ULANG PERMINTAAN</b></p>
    <p style="font-size: 13px; text-align: center;"><b>LAYANAN PENGUJIAN DAN / ATAU KALIBRASI ALAT-ALAT KESEHATAN</b></p>
    <p style="font-size: 13px; text-align: center;"><b>LOKA PENGAMANAN FASILITAS KESEHATAN (LPFK) BANJARBARU</b></p>

    <table style="margin-top: 20px; width: 100%">
        {{-- Data pelanggan --}}
        <tr>
            <td rowspan="2" style="width: 25px; vertical-align: top"><b>I.</b></td>
            <td>
                <b>DATA PELANGGAN</b>
            </td>
        </tr>
        <tr>
            <td>
                <table class="border-table" style="width: 100%">
                    <tr>
                        <td style="width: 200px">Nomor Order</td>
                        <td colspan="2">{{ $order->number }}</td>
                    </tr>
                    <tr>
                        <td>Nama Instansi</td>
                        <td colspan="2">{{ $order->user->fasyenkes_name }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td colspan="2">{{ $order->user->address }}</td>
                    </tr>
                    <tr>
                        <td>No. Telp./Fax</td>
                        <td colspan="2">{{ $order->user->phone }}</td>
                    </tr>
                    <tr>
                        <td rowspan="2">
                            Permintaan Surat/Telp/Fax/Email <br>
                            (*Coret yang tidak perlu)
                        </td>
                        <td style="width: 80px">Nomor</td>
                        <td>{{ $order->letter_number }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>{{ FormatHelper::toIndonesianDateFormat(date('d-m-Y', strtotime($order->letter_date))) }}</td>
                    </tr>
                    <tr>
                        <td>Surat Diterima Tanggal</td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td>Contact Person</td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td>No. Telp/HP</td>
                        <td colspan="2"></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr><td colspan="2" style="width: 100%; height: 10px"></td></tr>

        {{-- Data Alay Yang Akan Digunakan --}}
        <tr>
            <td rowspan="2" style="vertical-align: top; margin-top: 10px"><b>II.</b></td>
            <td>
                <b>DATA ALAT YANG AKAN DIKALIBRASI</b>
            </td>
        </tr>
        <tr>
            <td>
                <table class="border-table" style="width: 100%">
                    <tr>
                        <td class="text-center" style="width: 20px">NO</td>
                        <td class="text-center" style="width: 200px">NAMA ALAT</td>
                        <td class="text-center" style="width: 50px">JUMLAH (UNIT)</td>
                        <td class="text-center" style="width: 80px">TARIF (Rp.)</td>
                        <td class="text-center" style="width: 80px">TOTAL BIAYA (Rp.)</td>
                        <td class="text-center" style="width: 150px">KETERANGAN</td>
                    </tr>
                    <?php 
                        $number = 1;
                        $total_ammount = 0;
                        $total_price = 0;
                        $total_payment = 0;
                    ?>
                    @foreach ($order->alkes_order_with_category as $category => $alkes_order)
                        <tr>
                            <td colspan="6">
                                <b>{{ $category }}</b>
                            </td>
                        </tr>
                        @foreach ($alkes_order as $name => $value)
                            <tr>
                                <td class="text-center">{{ $number }}</td>
                                <td>{{ $name }}</td>
                                <td class="text-center">{{ $value['ammount'] }}</td>
                                <td class="text-right">{{ FormatHelper::toIndonesianCurrencyFormat($value['price']) }}</td>
                                <td class="text-right">{{ FormatHelper::toIndonesianCurrencyFormat($value['price'] * $value['ammount']) }}</td>
                                <td>{{ $value['description'] ?? '-' }}</td>
                            </tr>
                            <?php 
                                $number++;
                                $total_ammount += $value['ammount'];
                                $total_price += $value['price'];
                                $total_payment += $value['price'] * $value['ammount'];
                            ?>
                        @endforeach
                    @endforeach
                    <tr>
                        <td colspan="2"><b>Total</b></td>
                        <td class="text-center">{{ $total_ammount }}</td>
                        <td class="text-right">{{ FormatHelper::toIndonesianCurrencyFormat($total_price) }}</td>
                        <td class="text-right">{{ FormatHelper::toIndonesianCurrencyFormat($total_payment) }}</td>
                        <td></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr><td colspan="2" style="width: 100%; height: 10px"></td></tr>

        {{-- Rincian Biaya --}}
        <tr>
            <td rowspan="4" style="vertical-align: top; margin-top: 10px"><b>III.</b></td>
            <td>
                <b>RINCIAN BIAYA</b>
            </td>
        </tr>
        <tr>
            <td>
                <table class="border-table" style="width: 100%">
                    <tr>
                        <th class=text-center style="width:15px">No.</th>
                        <th class=text-center>Rincian</th>
                        <th class=text-center style="width: 100px">SubTotal (Rp.)</th>
                    </tr>
                    <tr>
                        <td style="text-align: center; vertical-align: top">1.</td>
                        <td>Total tarif Pengujian dan kalibrasi alat kesehatan (sesuai PP No.21 Tahun 2013 tentang jenis dan tarif atas jenis penerimaan negara bukan pajak yang berlaku pada kementerian kesehatan)</td>
                        <td class="text-right">{{ FormatHelper::toIndonesianCurrencyFormat($order->total_alkes_price) }}</td>
                    </tr>
                    <tr>
                        <td rowspan="4" style="text-align: center; vertical-align: top">2.</td>
                        <td colspan="2"><b>Biaya Petugas Pengujian dan / atau Kalibrasi</b></td>
                    </tr>
                    <tr>
                        <td>- Transportasi dan Akomodasi</td>
                        <td class="text-right">{{ FormatHelper::toIndonesianCurrencyFormat($order->accommodation) }}</td>
                    </tr>
                    <tr>
                        <td>- Biaya Petugas</td>
                        <td class="text-right">{{ FormatHelper::toIndonesianCurrencyFormat($order->daily_accommodation) }}</td>
                    </tr>
                    <tr>
                        <td>- Biaya Pemeriksaan Rapid Test</td>
                        <td class="text-right">{{ FormatHelper::toIndonesianCurrencyFormat($order->rapid_test_accommodation) }}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>TOTAL</b></td>
                        <td class="text-right"><b>Rp. {{ FormatHelper::toIndonesianCurrencyFormat($order->total_payment) }}</b></td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-center">
                            {{ FormatHelper::toIndonesianCurrencyStringFormat($order->total_payment). ' Rupiah' }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <b style="margin-left: 30px">HAL-HAL YANG PERLU DIKETAHUI DAN DIPERHATIKAN</b> <br>
    <table style="padding-left: 30px;">
        <tr>
            <td style="width: 25px; vertical-align: top">1.</td>
            <td>
                LPFK Banjarbaru dalam melakukan kegiatan Pengujian dan Kalibrasi berdasarkan ketentuan pada Surat Keputusan 
                <b>Direktur Jenderal Pelayanan Kesehatan</b> Nomor: <b>HK.02.02/V/5571/2018</b> Tentang Metode Kerja Pengujian 
                dan Kalibrasi Alat Kesehatan , dimana pelanggan harus menyiapkan beberapa hal sebagai berikut : <br>
                - Tempat kegiatan Pengujian dan Kalibrasi berada diruangan alat yang memiliki sistem Grounding <br>
                - Pengambilan data Pengujian dan Kalibrasi Alat Kesehatan dilakukan diruangan alat itu berada <br>
                Jika ketentuan ini tidak dapat dilakukan maka pelanggan harus menerima hasil apapun yang dihasilkan dari kegiatan Pengujian dan Kalibrasi tersebut.
            </td>
        </tr>
        <tr>
            <td style="width: 25px; vertical-align: top">2.</td>
            <td>
                Manajemen LPFK Banjarbaru menjamin dan bertanggungjawab atas ketidakberpihakan akibat dari tekanan - tekanan komersial, kekuasaan, keuangan, atau pengaruh - mempengaruhi hasil Pengujian dan Kalibrasi. Pengaruh lain komersial, kekuasaan, keuangan, atau pengaruh - pengaruh lain, baik dari dalam maupun luar yang dapat mempengaruhi hasil Pengujian dan Kalibrasi.
            </td>
        </tr>
        <tr>
            <td style="width: 25px; vertical-align: top">3.</td>
            <td>
                Manajemen LPFK Banjarbaru menjamin perlindungan atas kerahasiaan informasi dan kepemilikan pelanggan, termasuk prosedur untuk melindungi penyimpangan dan penyampaian hasil elektronik kecuali atas permintaan pelanggan dan keterkaitan dengan masalah hukum.
            </td>
        </tr>
        <tr>
            <td style="width: 25px; vertical-align: top">4.</td>
            <td>
                Untuk transportasi darat menggunakan moda transportasi yang tersendiri (tidak digabung dengan transportasi umum), karena untuk menjaga keamanan dan kelayakan alat standar pengujian dan kalibrasi serta petugas.
            </td>
        </tr>
        <tr>
            <td style="width: 25px; vertical-align: top">5.</td>
            <td>
                Untuk Kegiatan Pengujian dan / atau Kalibrasi, petugas akan membawa sejumlah alat standar sesuai daftar permintaan alat yang akan di lakukan Pengujian dan / atau Kalibrasi, apabila transportasi yang menggunakan Udara, untuk biaya kelebihan bagasi dan pengamanan alat standar, dibebankan ke pelanggan.
            </td>
        </tr>
        <tr>
            <td style="width: 25px; vertical-align: top">6.</td>
            <td>
                Untuk hotel yang disediakan bagi petugas, tidak terlalu jauh dengan akses fasilitas umum, bersih, dan PDAM/PLN lancar.
            </td>
        </tr>
        <tr>
            <td style="width: 25px; vertical-align: top">7.</td>
            <td>
                Pihak pelanggan dapat menghubungi petugas secara langsung terkait pemesanan tiket, penjemputan dan penginapan. Jika sudah ada persetujuan pembiayaan dan penjadwalan kegiatan.
            </td>
        </tr>
        <tr>
            <td style="width: 25px; vertical-align: top">8.</td>
            <td>
                Jika pada saat pelaksanaan kegiatan Pengujian dan atau Kalibrasi terdapat perubahan jumlah alat dan ketidaksesuaian lainnya maka persetujuan pelanggan atas perubahan atau ketidaksesuaian tersebut disahkan dengan menandatangani berita acara Pengujian dan Kalibrasi antara pihak pelanggan dengan penanggung jawab Pengujian dan Kalibrasi (Ketua Tim Dinas Luar).
            </td>
        </tr>
        <tr>
            <td style="width: 25px; vertical-align: top">9.</td>
            <td>
                Untuk kelancaran kegiatan Pengujian dan atau Kalibrasi, diharapkan saat pelaksanaan kegiatan alat-alat yang akan diuji dan dikalibrasi sudah disiapkan beserta petugas yang akan mendampingi Tim kami selama pelaksanaan kegiatan tersebut, segala pembiayaan terkait petugas pendamping menjadi tanggung jawab pihak pelanggan.
            </td>
        </tr>
    </table>

    <table style="width: 100%">
        <tr>
            <td style="width: 33%"></td>
            <td style="width: 33%" class="text-center">
                <img src="{{ asset('digital_sign/Yuni_Irmawati_Digital_Sign.jpg') }}" style="width: 100px; margin-top: 10px">
            </td>
            <td style="width: 33%" class="text-center">
                Pihak Pelanggan,
                <br>
                <br>
                <br>
                <br>
                (.......................................)
            </td>
        </tr>
    </table>
</body>
</html>