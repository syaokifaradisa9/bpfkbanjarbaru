<!DOCTYPE html>
<html>
    <head>
        <title>LAPORAN KALIBRASI SUCTION PUMP</title>
        <style type="text/css">
            *{
                font-size: 10px;
                font-family: Arial, Helvetica, sans-serif;
                margin: 0px;
                padding: 0px;
            }
            body{
                margin-top: 22px;
                margin-bottom: 20px;
                margin-right: 70px;
            }
            #content{
                margin-left: 125px;
            }
            #title{
                margin-top: 24px;
                font-size: 12px;
                font-weight: bold;
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
                margin-top: 8px
            }
            .result-table{
                border: 1px solid black;
                border-collapse: collapse;
            }
            .result-table td, .result-table th {
                border: 1px solid black;
                border-collapse: collapse;
            }
            .result-table th{
                padding-left: 5px;
                padding-right: 5px;
                padding-top: 3px;
                padding-bottom: 3px;
            }
            .symbol{
                font-family: DejaVu Sans;
                font-size: 10px !important;
            }
            table tr{
                margin: 0px;
                padding: 0px;
            }
        </style>
        <!-- CSS only -->
    </head>
    <body>
        <p style="float: right; font-size: 8px">LV. 027 - 18</p>
        <p id="title">{{ $data->getCell('A1')->getFormattedValue() }}</p>
        <p id="subtitle">
            {{ $data->getCell('A2')->getFormattedValue() }}
        </p>

        <div id="content">
            <table style="margin-top: 22px">
                <tr>
                    <td style="width: 137px">Merek</td>
                    <td>: {{ $data->getCell('F5')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Model/Tipe</td>
                    <td>: {{ $data->getCell('F6')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">No. Seri</td>
                    <td>: {{ $data->getCell('F7')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Resolusi</td>
                    <td>: {{ $data->getCell('F8')->getFormattedValue() }} mmHg</td>
                </tr>
                <tr>
                    <td style="width: 137px">Tanggal Penerimaan Alat</td>
                    <td>: {{ $data->getCell('F9')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Tanggal Kalibrasi</td>
                    <td>: {{ $data->getCell('F10')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Tempat Kalibrasi</td>
                    <td>: {{ $data->getCell('F11')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Nama Ruang</td>
                    <td>: {{ $data->getCell('F12')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Metode Kerja</td>
                    <td>: {{ $data->getCell('F13')->getFormattedValue() }}</td>
                </tr>
            </table>
            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="4" style="width: 25px">I.</th>
                    <th class="text-left" colspan="2">Kondisi Ruang</th>
                </tr>
                <tr>
                    <td style="width: 109px">1. Suhu</td>
                    <td class="symbol">
                        : {{ $data->getCell('F16')->getFormattedValue()
                        ." ".$data->getCell('G16')->getFormattedValue()
                        ." ".$data->getCell('H16')->getFormattedValue()
                        ." ".$data->getCell('I16')->getFormattedValue() }}
                    </td>
                </tr>
                <tr>
                    <td style="width: 109px">2. Kelembapan</td>
                    <td class="symbol">
                        : {{ $data->getCell('F17')->getFormattedValue()
                        ." ".$data->getCell('G17')->getFormattedValue()
                        ." ".$data->getCell('H17')->getFormattedValue()
                        ." ".$data->getCell('I17')->getFormattedValue() }}
                    </td>
                </tr>
            </table>
    
            {{-- Pemeriksaan Kondisi Fisik dan Fungsi Alat --}}
            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="3" style="width: 25px">II.</th>
                    <th class="text-left" colspan="2">Pemeriksaan Kondisi Fisik dan Fungsi Alat</th>
                </tr>
                <tr>
                    <td style="width: 109px">1. Fisik</td>
                    <td>: {{ $data->getCell('F19')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 109px">2. Fungsi</td>
                    <td>: {{ $data->getCell('F20')->getFormattedValue() }}</td>
                </tr>
            </table>
    
            {{-- Hasil Pengujian Keselamatan Listrik --}}
            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="9" style="width: 25px">III.</th>
                    <th class="text-left" colspan="2">Pengujian keselamatan Listrik</th>
                </tr>
                <tr>
                    <table>
                        <tr>
                            <th rowspan="2" class="text-left" style="width: 20px">A.</th>
                            <th class="text-left">Pengujian Kebocoran</th>
                        </tr>
                        <tr>
                            <td class="full-width">
                                <table class="result-table">
                                    <tr>
                                        <th>Parameter</th>
                                        <th>Laju Kebocoran tekanan 250 mmHg dalam 1 menit<br>(mmhg)</th>
                                        <th>Toleransi<br>(mmhg)</th>
                                    </tr>
                                    <tr>
                                        <th>Kebocoran Tekanan</th>
                                        <td class="text-center">{{ $data->getCell('F26')->getFormattedValue() }}</td>
                                        <td class="text-center symbol">{{ $data->getCell('I26')->getFormattedValue() }}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </tr>
                <tr></tr>
                <tr>
                    <table>
                        <tr>
                            <th rowspan="2" class="text-left" style="width: 20px">B.</th>
                            <th class="text-left">Kalibrasi Pulse Rate</th>
                        </tr>
                        <tr>
                            <td class="full-width">
                                <table class="result-table">
                                    <tr>
                                        <th>Parameter</th>
                                        <th>Laju Kebocoran tekanan 250 mmHg dalam 1 menit<br>(mmhg)</th>
                                        <th>Toleransi<br>(mmhg)</th>
                                    </tr>
                                    <tr>
                                        <th>Kebocoran Tekanan</th>
                                        <td class="text-center">{{ $data->getCell('F31')->getFormattedValue() }}</td>
                                        <td class="text-center symbol">{{ $data->getCell('I31')->getFormattedValue() }}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </tr>
                <tr></tr>
                <tr>
                    <table>
                        <tr>
                            <th rowspan="2" class="text-left" style="width: 20px">C.</th>
                            <th class="text-left">Kalibrasi Akurasi Tekanan</th>
                        </tr>
                        <tr>
                            <td class="full-width">
                                <table class="result-table">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">No</th>
                                            <th rowspan="2">Pembacaan Alat<br>(mmHg)</th>
                                            <th colspan="2">Pembacaan Standar</th>
                                            <th colspan="2">Koreksi</th>
                                            <th rowspan="2">Toleransi<br>(mmHg)</th>
                                            <th colspan="2">Ketidakpastian Pengukuran</th>
                                        </tr>
                                        <tr>
                                            <th>Naik <br>(mmHg)</th>
                                            <th>Turun<br>(mmHg)</th>
                                            <th>Naik <br>(mmHg)</th>
                                            <th>Turun<br>(mmHg)</th>
                                            <th>Naik <br>(mmHg)</th>
                                            <th>Turun<br>(mmHg)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 1; $i <= 6; $i++)
                                            <tr>
                                                <td class="text-center">{{ $i }}</td>
                                                <td class="full-width text-center">{{ $data->getCell('C'.($i + 42))->getFormattedValue() }}</td>
                                                <td class="full-width text-center">{{ $data->getCell('F'.($i + 42))->getFormattedValue() }}</td>
                                                <td class="full-width text-center">{{ $data->getCell('G'.($i + 42))->getFormattedValue() }}</td>
                                                <td class="full-width text-center">{{ $data->getCell('H'.($i + 42))->getFormattedValue() }}</td>
                                                <td class="full-width text-center">{{ $data->getCell('I'.($i + 42))->getFormattedValue() }}</td>
                                                @if ($i == 1)
                                                    <td class="full-width text-center symbol" rowspan="6">{{ $data->getCell('J45')->getFormattedValue() }}</td>
                                                @endif
                                                <td class="full-width text-center">{{ $data->getCell('K'.($i + 42))->getFormattedValue() }}</td>
                                                <td class="full-width text-center">{{ $data->getCell('L'.($i + 42))->getFormattedValue() }}</td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>
                </tr>
            </table>
    
            <table class="top-margin-spacer">
                <?php $rowspan = 1; ?>
                @for ($i = 54; $i <= 58; $i++)
                    @if ($data->getCell('B'.$i)->getFormattedValue() != "")
                        <?php $rowspan++; ?>
                    @endif
                @endfor
                <tr>
                    <th class="text-left" rowspan="6" style="width: 25px">IV.</th>
                    <th style="text-align: left">Keterangan</th>
                </tr>
                @for ($i = 54; $i <= 58; $i++)
                    @if ($data->getCell('B'.$i)->getFormattedValue() != "")
                        <tr><td class="full-width">{{ $data->getCell('B'.$i)->getFormattedValue() }}</td></tr>
                    @endif
                @endfor
            </table>
    
            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="3" style="width: 25px">V.</th>
                    <th class="text-left">Alat Ukur Yang Digunakan</th>
                </tr>
                <tr><td class="full-width">{{ $data->getCell('B61')->getFormattedValue() }}</td></tr>
                <tr><td class="full-width">{{ $data->getCell('B62')->getFormattedValue() }}</td></tr>
            </table>
    
            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="2" style="width: 25px">VI.</th>
                    <th class="text-left">Kesimpulan</th>
                </tr>
                <tr><td class="full-width">
                    {{ $data->getCell('B65')->getFormattedValue() }}
                </td></tr>
            </table>
    
            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="2" style="width: 25px">VIII.</th>
                    <th class="text-left">Petugas Kalibrasi</th>
                </tr>
                <tr><td class="full-width">{{ $data->getCell('B67')->getFormattedValue() }}</td></tr>
            </table>
    
            <div style="width: 100%;">
                <table class="top-margin-spacer" style="margin-right: 90px; float: right">
                    <tr>
                        <td class="text-left">Menyetujui, <br> Kepala Instalasi Laboratorium<br>Pengujian dan Kalibrasi</td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('digital_sign/Choirul_Huda_Digital_Sign.jpg') }}" alt="" style="width: 113px; height: 113px; margin-top:10px">
                        </td>
                    </tr>
                </table>
            </div>
            {{-- <p class="text-center" style="font-size: 7px; width: 100%">
                Dilarang keras mengutip dan atau mempublikasikan sebagian isi sertifikat ini tanpa seijin LPFK Banjarbaru <br>
                Sertifikat ini sah apabila dibubuhi cap LPFK Banjarbaru dan ditandatangani oleh pejabat yang berwenang
            </p> --}}
        </div>
    </body>
</html>