<!DOCTYPE html>
<html>
    <head>
        <title>LAPORAN KALIBRASI INFUSION PUMP</title>
        <style type="text/css">
            *{
                font-size: 13px;
                font-family: "Times New Roman", Times, serif;
                font-weight: bold;
                margin: 0px;
                padding: 0px;
            }
            body{
                margin: 0px;
            }
            #content{
                margin-top: 20px;
                margin-left: 83px;
                margin-right: 67px;
            }
            #title{
                font-size: 29px;
                text-decoration: underline;
            }
            #subtitle{
                font-size: 11px;
            }
            #title, #subtitle{
                text-align: center;
            }
            .text-center{
                text-align: center
            }
            .full-width{
                width: 100%
            }
            .text-left{
                text-align: left;
                vertical-align: text-top;
            }
            .top-margin-spacer{
                margin-top: 15px
            }
            .result-table{
                border: 1px solid black;
                border-collapse: collapse;
            }
            .result-table td, .result-table th {
                border: 1px solid black;
                border-collapse: collapse;
            }
            .have-border{
                border: 1px solid black;
                border-collapse: collapse;
                height: 33px;
                text-align: left;
                vertical-align: top;
                padding-top: 1px;
            }
            .text-content{
                padding-left: 2px;
            }
            .result-table th{
                padding-left: 5px;
                padding-right: 5px;
                padding-top: 3px;
                padding-bottom: 3px;
            }
            table tr{
                margin: 0px;
                padding: 0px;
            }
            .left-layout{
                vertical-align: middle;
            }
            .middle-layout{
                vertical-align: middle;
                width: 3%;
            }
            .right-layout{
                vertical-align: middle;
                width: 48%;
            }
            .pl{
                padding-left: 5px;
            }
            footer {
                position: fixed;
                left: 0;
                bottom: 0;
                margin-bottom: 20px;
                width: 100%;
            }
        </style>
        <!-- CSS only -->
    </head>
    <body>
        <header>
            <div style="margin-top: 20px; margin-left: 83px; margin-right: 67px;">
                <table style="width: 100%;" class="text-center">
                    <tr>
                        <td style="width: 5%">
                            <img src="{{ asset('img/logo/kemenkes.jpg') }}" style="width: 75px">
                        </td>
                        <td style="width: auto">
                            <p style="font-size: 18px; font-weight: 700; color: #00B050" class="text-center">KEMENTERIAN KESEHATAN REPUBLIK INDONESIA</p>
                            <p style="font-size: 14px; font-weight: 700; color: #00B050" class="text-center">DIREKTORAT JENDERAL PELAYANAN KESEHATAN</p>
                            <p style="font-size: 14px; font-weight: 900; color: #00B050" class="text-center">LOKA PENGAMANAN FASILITAS KESEHATAN BANJARBARU</p>
                            <p style="font-size: 9px; margin-top: 5px; color: #00B050" class="text-center">Jln. Banua Praja Utara RT. 03, RW. 04, Kel. Cempaka, Kec. Cempaka, Banjarbaru Kode Pos 70732</p>
                            <p style="font-size: 9px; color: #00B050" class="text-center">Telp./Fax : 0511 - 5915674; No Layanan : 0831-50809115</p>
                            <p style="font-size: 9px; color: #00B050" class="text-center">Pos-el : lpfk_banjarbaru@yahoo.co.id; lpfkbanjarbaru@gmail.com </p>
                            <p style="font-size: 9px; color: #00B050" class="text-center">Website : bpfk-banjarbaru.org</p>
                        </td>
                        <td style="width: 5%">
                            <img src="{{ asset('img/logo/logo.jpg') }}" style="width: 75px">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div style="width: 100%; height: 2px; background-color: #00B050; margin-top: 10px"></div>
                            <div style="width: 100%; height: 1px; background-color: #00B050; margin-top: 2px"></div>
                        </td>
                    </tr>
                </table>
            </div>
        </header>

        <footer>
            <div style="margin-left: 83px; margin-right: 67px;">
                <table class="full-width">
                    <tr>
                        <td style="width: 95%" style="vertical-align: bottom">
                            <p style="font-size: 9px">
                                {{-- Sertifikat ini terdiri dari 2 halaman --}}
                            </p>
                        </td>
                        <td style="width: 5%" class="text-right">
                            <img src="{{ asset('img/logo/logo kan.png') }}" width="90px">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding-top: 5px">
                            <div style="width: 100%; height: 1px; background-color: #00B050"></div>
                        </td>
                    </tr><tr>
                        <td colspan="2" class="text-center">
                            <p style="font-size: 8px; font-weight: 100; color: #00B050">
                                Dilarang keras mengutip / memperbanyak dan / atau mempublikasikan sebagian isi Sertifikat ini tanpa izin LPFk banjarbaru <br>
                                Sertifikat ini sah bila dibubuhi cap LPFK Banjarbaru
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
        </footer>

        <main>
            <h1 id="title" style="margin-top: 15px">{{ $excel->getCell('A2')->getFormattedValue() }}</h1>
            <p id="subtitle">
                {{ $excel->getCell('A3')->getFormattedValue() }}
            </p>
    
            <div id="content">
                <p style="float: right; font-size: 11px; font-weight: 400">LV. 027 - 18</p>
                <table class="full-width" style="margin-top: 27px">
                    <tr>
                        <td class="have-border text-content left-layout pl">
                            Nama Alat : {{ $excel->getCell('B6')->getFormattedValue() }}
                        </td>
                        <td class="middle-layout"></td>
                        <td class="have-border text-content right-layout pl">Nomor Order : {{ $excel->getCell('F6')->getFormattedValue() }}</td>
                    </tr>
                </table>
                <table class="top-margin-spacer full-width">
                    <tr>
                        <td class="text-content left-layout">Merek</td>
                        <td class="text-center middle-layout">:</td>
                        <td class="text-content right-layout">{{ $excel->getCell('D8')->getFormattedValue() }}</td>
                    </tr>
                    <tr>
                        <td class="text-content" style="padding-top: 4px">Model / Tipe</td>
                        <td class="text-center"  style="padding-top: 4px">:</td>
                        <td class="text-content" style="padding-top: 4px">{{ $excel->getCell('D9')->getFormattedValue() }}</td>
                    </tr>
                    <tr>
                        <td class="text-content" style="padding-top: 4px">Nomor Seri</td>
                        <td class="text-center"  style="padding-top: 4px">:</td>
                        <td class="text-content" style="padding-top: 4px">{{ $excel->getCell('D10')->getFormattedValue() }}</td>
                    </tr>
                </table>
                <table style="margin-top: 17px" class="full-width">
                    <tr>
                        <td class="have-border text-content left-layout pl">Nama Pemilik : {{ $general['fasyenkes'] }}</td>
                        <td class="middle-layout"></td>
                        <td class="have-border text-content right-layout pl">Identitas Pemilik : {{ Str::title($general['fasyenkes_type']) }}</td>
                    </tr>
                </table>
                <table class="full-width top-margin-spacer">
                    <tr>
                        <td class="text-content left-layout" style="vertical-align: top">Alamat Pemilik</td>
                        <td class="text-center middle-layout" style="vertical-align: top">:</td>
                        <td class="text-content right-layout">{{ $general['fasyenkes_address'] }}</td>
                    </tr>
                    <tr>
                        <td class="text-content" style="padding-top: 4px">Nama Ruang</td>
                        <td class="text-center"  style="padding-top: 4px">:</td>
                        <td class="text-content" style="padding-top: 4px">{{ $excel->getCell('D17')->getFormattedValue() }}</td>
                    </tr>
                    <tr>
                        <td class="text-content" style="padding-top: 4px">Tanggal Penerimaan Alat</td>
                        <td class="text-center"  style="padding-top: 4px">:</td>
                        <td class="text-content" style="padding-top: 4px">{{ FormatHelper::toIndonesianDateFormat($excel->getCell('D18')->getFormattedValue()) }}</td>
                    </tr>
                    <tr>
                        <td class="text-content" style="padding-top: 4px">Tanggal Kalibrasi</td>
                        <td class="text-center"  style="padding-top: 4px">:</td>
                        <td class="text-content" style="padding-top: 4px">{{ FormatHelper::toIndonesianDateFormat($excel->getCell('D19')->getFormattedValue()) }}</td>
                    </tr>
                    <tr>
                        <td class="text-content" style="padding-top: 4px">Penanggungjawab Kalibrasi</td>
                        <td class="text-center"  style="padding-top: 4px">:</td>
                        <td class="text-content" style="padding-top: 4px">{{ $excel->getCell('D20')->getFormattedValue() }}</td>
                    </tr>
                    <tr>
                        <td class="text-content" style="padding-top: 4px">Lokasi Kalibrasi</td>
                        <td class="text-center"  style="padding-top: 4px">:</td>
                        <td class="text-content" style="padding-top: 4px">{{ $excel->getCell('D21')->getFormattedValue() }}</td>
                    </tr>
                    <tr>
                        <td class="text-content" style="padding-top: 4px; vertical-align: top">Hasil Kalibrasi</td>
                        <td class="text-center"  style="padding-top: 4px; vertical-align: top">:</td>
                        <td class="text-content" style="padding-top: 4px;">Laik Pakai, disarankan untuk menguji ulang pada tanggal </td>
                    </tr>
                    <tr>
                        <td class="text-content" style="padding-top: 4px">Metode Kerja</td>
                        <td class="text-center"  style="padding-top: 4px">:</td>
                        <td class="text-content" style="padding-top: 4px">{{ $excel->getCell('D23')->getFormattedValue() }}</td>
                    </tr>
                </table>
                <table class="full-width" style="margin-top: 30px">
                    <tr>
                        <td class="left-layout"></td>
                        <td class="middle-layout"></td>
                        <td class="text-content text-left right-layout">
                            Banjarbaru, {{ FormatHelper::toIndonesianDateFormat(date('d-m-Y')) }}<br> <br>
                            Kepala Loka Pengamanan <br>
                            Fasilitas Kesehatan banjarbaru <br> 
                            <img src="{{ asset('digital_sign/Yuni_Irmawati_Digital_Sign.jpg') }}" alt="" style="width: 113px; height: 113px; margin-top:10px">
                        </td>
                    </tr>
                </table>
            </div>
        </main>
    </body>
</html>