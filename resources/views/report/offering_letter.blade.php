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
    </style>
</head>
<body>
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
        <tr>
            <td colspan="3">
                <div style="width: 100%; height: 2px; background-color: black; margin-top: 20px"></div>
                <div style="width: 100%; height: 1px; background-color: black; margin-top: 2px"></div>
            </td>
        </tr>
    </table>

    {{-- Metadata Surat --}}
    <div style="margin-top: 15px">
        <div>
            <div style="width: 90%; display: inline-block;">
                <div style="width: 80px; display: inline-block;">Nomor</div>
                : YM.01.03/LV.4/{{ explode(' ',explode('.',$order->number)[1])[0] }}/{{ date('Y', strtotime($order->created_at)) }}
            </div>
            <div style="width: auto; display: inline-block; text-align: right">
                {{ FormatHelper::toIndonesianDateFormat(date('d-m-Y', time())) }}
            </div>
        </div>
        <div>
            <div style="width: 80px; display: inline-block;">Lampiran</div>
            : Satu Berkas
        </div>
        <div>
            <div style="width: 80px; display: inline-block;">Hal</div>
            : Penawaran Biaya Inspeksi, Pengujian dan/atau Kalibrasi Alat Kesehatan
        </div>
    </div>

    <p style="margin-top: 20px">
        Yth. <br>
        Pimpinan {{ $order->user->fasyenkes_name }} <br>
        {{ $order->user->city }} - {{ $order->user->province }}
    </p>

    
    <p style="margin-top: 30px">
        Menindaklanjuti surat dari {{ $order->user->fasyenkes_name }} nomor surat {{ $order->letter_number }}, tanggal {{ FormatHelper::toIndonesianDateFormat(date('d-m-Y', strtotime($order->letter_date))) }},
        perihal permohonan pengujian dan kalibrasi alat kesehatan, maka berikut ini kami sampaikan:
    </p>

    <table style="margin-top: 5px; width: 100%">
        <tr>
            <td style="width: 20px; vertical-align: top">1.</td>
            <td>
                Total Biaya untuk Layanan Pengujian dan / atau Kalibrasi adalah sebesar : Rp. {{ FormatHelper::toIndonesianCurrencyFormat($order->total_alkes_price) }} ({{ FormatHelper::toIndonesianCurrencyStringFormat($order->total_accommodation). ' Rupiah' }}) dengan jumlah item alat sesuai perincian terlampir.
            </td>
        </tr>
        <tr>
            <td style="width: 20px; vertical-align: top">2.</td>
            <td>
                <div>
                    <b>Sesuai PP No. 64 Tahun 2019 Pasal 5 Ayat 1 bahwa selain pola Tarif, Pelanggan juga dikenakan biaya Akomodasi, Biaya Petugas dan Transportasi ( Peraturan Menteri Keuangan RI Nomor : 78/PMK.02/2019 Tentang Standar Biaya Masukan Tahun Anggaran 2020), dengan rincian biaya terlampir.</b>
                </div>
                <div style="margin-top: 8px">
                    <b>"PP No. 64 Tahun 2019 Tentang Jenis dan Tarif Atas Jenis Penerimaan Negara Bukan Pajak yang berlaku pada Kementerian Kesehatan [Pasal 5 sayat (1)] :“ Biaya akomodasi, biaya petugas, dan transportasi sebagaimana dimaksud pada ayat (1) dibebankan kepada wajib bayar sesuai dengan ketentuan Peraturan Perundang-undangan”) dan Bagian Penjelasan atas PP No 64 Tahun 2019, untuk pasal 5 ayat 1 : “Yang dimaksud dengan “ketentuan peraturan perundang- undangan” adalah Peraturan Menteri Keuangan yang mengatur mengenai standar biaya".</b>
                </div>
            </td>
        </tr>
        <tr style="margin-top: 5px">
            <td style="width: 20px; vertical-align: top">3.</td>
            <td>
                Apabila disetujui maka pihak {{ $order->user->fasyenkes_name }} harus melakukan konfirmasi persetujuan pelaksanaan Pengujian dan/atau Kalibrasi Alat Kesehatan dengan menandatangani dan diberi stempel pada formulir kaji ulang permintaan (terlampir) dan mengirimkan kembali formulir tersebut ke LPFK Banjarbaru 
                <b>selambat-lambatnya 4 hari kerja setelah Penawaran Biaya Pengujian dan / atau Kalibrasi Alat Kesehatan diterima</b>, untuk dimasukan dalam daftar antrian pelaksanaan Pengujian dan / atau Kalibrasi.
            </td>
        </tr>
        <tr>
            <td style="width: 20px; vertical-align: top">4.</td>
            <td>
                LPFK Banjarbaru tidak bertanggung jawab atas segala kerusakan yang timbul pada alat kesehatan sebagai akibat dilakukannya Pelayanan Pengujian dan / atau Kalibrasi yang dilakukan dan telah memenuhi prosedur Pengujian dan / atau Kalibrasi yang berlaku di LPFK Banjarbaru.
            </td>
        </tr>
        <tr>
            <td style="width: 20px; vertical-align: top">5.</td>
            <td>
                Apabila Petugas Pengujian dan / atau Kalibrasi telah berada dilokasi Pengujian dan / atau Kalibrasi dan Alat Kesehatan mengalami kerusakan tanpa ada pemberitahuan sebelumnya maka pihak sd Tetap dibebankan biaya akomodasi, transportasi, serta Biaya petugas Pengujian dan / atau Kalibrasi. CP Pelayanan Teknik : Erna Fatmawati
                <b>(Telp. & Whatsapp 0831-5080-9115)</b>
            </td>
        </tr>
        <tr>
            <td style="width: 20px; vertical-align: top">6.</td>
            <td>
                <b>
                    Untuk Biaya Transportasi dan Akomodasi Petugas, kami minta disediakan/disiapkan di awal pelaksanaan pengujian dan atau kalibrasi setelah ada pemberitahuan jadwal pengujian dan atau kalibrasi dari pihak LPFK Banjarbaru, pembiayaan tersebut dapat diserahkan langsung kepada petugas pengujian dan kalibrasi sebelum pelaksanaan kegiatan, untuk Transportasi dan Akomodasi yang disiapkan agar disesuaikan terutama jika ada perbedaan jadwal kegiatan. Untum mekanisme penyediaan Transportasi dan Akomodasi dapat melalui 2 Alternatif yakni :
                </b>
                <div style="margin-left: 16px">
                    <ol type="a">
                        <li>
                            <b>Penyediaan langsung oleh pihak fasyankes dengan mengikuti persyaratan terkait penyediaan transportasi petugas, alat kerja dan akomodasi tersebut (Bagian IV) atau;</b>
                        </li>
                        <li>
                            <b>Penyediaan uang muka pekerjaan oleh fasyankes untuk transportasi dan akomodasi petugas serta pengangkutan alat kerja melalui rekening petugas</b>
                        </li>
                    </ol>
                </div>
            </td>
        </tr>
        <tr>
            <td style="width: 20px; vertical-align: top">7.</td>
            <td>
                Untuk biaya tarif Pengujian dan Kalibrasi Alat Kesehatan dibayarkan melalui Aplikasi Simponi – Kementerian Keuangan 
                (<a href="https://simponi.kemenkeu.go.id">https://simponi.kemenkeu.go.id</a>) Setelah pekerjaan selesai.
            </td>
        </tr>
        <tr>
            <td style="width: 20px; vertical-align: top">8.</td>
            <td>
                Penyerahan Hasil Inspeksi, Pengujian dan/atau Kalibrasi akan dikirimkan setelah pelaksanaan pekerjaan selesai dan bukti pelunasan tagihan Inspeksi, Pengujian dan/atau Kalibrasi Alat Kesehatan.
            </td>
        </tr>
        <tr>
            <td style="width: 20px; vertical-align: top">9.</td>
            <td>
                Adanya masa darurat COVID-19 maka untuk penjadwalan kegiatan pengujian dan kalibrasi akan kami sesuaikan dengan kondisi status penyebaran pandemi COVID-19 tersebut untuk upaya pencegahan penyebaran COVID-19 dan keamanan petugas serta fasyankes.
            </td>
        </tr>
        <tr>
            <td style="width: 20px; vertical-align: top">10.</td>
            <td>
                Adanya resiko pekerjaan inspeksi, pengujian dan kalibrasi yang berpotensi tinggi untuk kontak dekat dengan benda dan permukaan yang mungkin terkontaminasi oleh virus, maka fasilitas pelayanan kesehatan 
                <b>
                    wajib menyediakan Alat Pelindung Diri (APD) yang sesuai standar protokoler kesehatan di masa pandemi COVID-19 sebagai upaya mencegah dan mengendalikan potensi penularan COVID-19 pada saat kegiatan inspeksi pengujian dan kalibrasi. Disamping itu juga menyediakan fasilitas pemeriksaan rapid/swab test untuk melengkapi prosedur perjalanan ke fasilitas pelayanan kesehatan melalui udara (penerbangan), sebagai tindakan pemeriksaan petugas dalam keadaan sehat dan bebas virus saat melakukan inspeksi, pengujian dan kalibrasi.
                </b>
            </td>
        </tr>
    </table>
    <p style="margin-top: 20px">
        Demikian kami sampaikan, atas kerjasamanya kami ucapkan terimakasih
    </p>

    <div style="width: 100%" class="text-center">
        <img src="{{ asset('digital_sign/Yuni_Irmawati_Digital_Sign.jpg') }}" style="width: 100px; margin-top: 10px">
    </div>
</body>
</html>