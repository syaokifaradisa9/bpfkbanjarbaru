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
                    <td>: {{ $data->getCell('F3')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Model/Tipe</td>
                    <td>: {{ $data->getCell('F4')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">No. Seri</td>
                    <td>: {{ $data->getCell('F5')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Resolusi</td>
                    <td>: {{ $data->getCell('F6')->getFormattedValue() }} (mmHg)</td>
                </tr>
                <tr>
                    <td style="width: 137px">Tanggal Penerimaan Alat</td>
                    <td>: {{ $data->getCell('F7')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Tanggal Kalibrasi</td>
                    <td>: {{ $data->getCell('F8')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Tempat Kalibrasi</td>
                    <td>: {{ $data->getCell('F9')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Nama Ruang</td>
                    <td>: {{ $data->getCell('F10')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Metode Kerja</td>
                    <td>: {{ $data->getCell('F11')->getFormattedValue() }}</td>
                </tr>
            </table>
            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="5" style="width: 25px">I.</th>
                    <th class="text-left" colspan="2">Kondisi Ruang</th>
                </tr>
                <tr>
                    <td style="width: 109px">1. Suhu</td>
                    <td class="symbol">
                        : {{ $data->getCell('F14')->getFormattedValue()
                        ." ".$data->getCell('G14')->getFormattedValue()
                        ." ".$data->getCell('H14')->getFormattedValue()
                        ." ".$data->getCell('I14')->getFormattedValue() }}
                    </td>
                </tr>
                <tr>
                    <td style="width: 109px">2. Kelembapan</td>
                    <td class="symbol">
                        : {{ $data->getCell('F15')->getFormattedValue()
                        ." ".$data->getCell('G15')->getFormattedValue()
                        ." ".$data->getCell('H15')->getFormattedValue()
                        ." ".$data->getCell('I15')->getFormattedValue() }}
                    </td>
                </tr>
                <tr>
                    <td style="width: 109px">3. Tekanan Udara</td>
                    <td class="symbol">
                        : {{ $data->getCell('F16')->getFormattedValue()
                        ." ".$data->getCell('G16')->getFormattedValue()
                        ." ".$data->getCell('H16')->getFormattedValue()
                        ." ".$data->getCell('I16')->getFormattedValue() }}
                    </td>
                </tr>
                <tr>
                    <td style="width: 109px">4. Tegangan Jala-jala</td>
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
                    <th class="text-left" rowspan="2" style="width: 25px">III.</th>
                    <th class="text-left" colspan="2">Hasil Pengujian keselamatan Listrik</th>
                </tr>
                <tr>
                    <td style="width: 100%">
                        <table class="result-table">
                            <tr>
                                <th style="width: 5%">No.</th>
                                <th style="width: 70%">Parameter</th>
                                <th style="width: 13%">Hasil Ukur</th>
                                <th style="width: 12%">Ambang Batas yang Diizinkan</th>
                            </tr>
                            @for ($i = 1; $i <= 3; $i++)
                                <tr>
                                    <td class="text-center">{{ $i }}</td>
                                    <td class="symbol">{{ $data->getCell('B'.(23 + $i))->getFormattedValue() }}</td>
                                    <td class="text-center">{{ $data->getCell('J'.(23 + $i))->getFormattedValue()." ".$data->getCell('K'.(23 + $i))->getFormattedValue() }}</td>
                                    <td class="symbol text-center">{{ $data->getCell('L'.(23 + $i))->getFormattedValue() }}</td>
                                </tr>
                            @endfor
                        </table>
                    </td>
                </tr>
            </table>

            {{-- Hasil Pengujian Keselamatan Listrik --}}
            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="6" style="width: 25px">IV.</th>
                    <th class="text-left" colspan="2">Pengujian keselamatan Listrik</th>
                </tr>
                <tr>
                    <table>
                        <tr>
                            <th rowspan="2" class="text-left" style="width: 20px">A.</th>
                            <th class="text-left">Pengukuran Akurasi Vacuum Gauge</th>
                        </tr>
                        <tr>
                            <td class="full-width">
                                <table class="result-table">
                                    <tr>
                                        <th rowspan="2" class="text-center">No</th>
                                        <th rowspan="2" class="text-center">Pembacaan Alat (mmHg)</th>
                                        <th colspan="2" class="text-center">Pembacaan Standar</th>
                                        <th colspan="2" class="text-center">Koreksi</th>
                                        <th colspan="2" class="text-center">Koreksi Relatif</th>
                                        <th rowspan="2" class="text-center">Toleransi <br> (%)</th>
                                        <th colspan="2" class="text-center">Ketidakpastian Pengukuran Relatif (%)</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Naik <br>(mmHg)</th>
                                        <th class="text-center">Turun <br>(mmHg)</th>
                                        <th class="text-center">Naik <br>(mmHg)</th>
                                        <th class="text-center">Turun <br>(mmHg)</th>
                                        <th class="text-center">Naik <br>(%)</th>
                                        <th class="text-center">Turun <br>(%)</th>
                                        <th class="text-center">Naik <br>(%)</th>
                                        <th class="text-center">Turun <br>(%)</th>
                                    </tr>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <tr>
                                            <td class="text-center">{{ $i }}</td>
                                            <td class="text-center">{{ $data->getCell('C'.(48 + $i))->getFormattedValue() }}</td>
                                            <td class="text-center">{{ $data->getCell('F'.(48 + $i))->getFormattedValue() }}</td>
                                            <td class="text-center">{{ $data->getCell('H'.(48 + $i))->getFormattedValue() }}</td>
                                            <td class="text-center">{{ $data->getCell('I'.(48 + $i))->getFormattedValue() }}</td>
                                            <td class="text-center">{{ $data->getCell('J'.(48 + $i))->getFormattedValue() }}</td>
                                            <td class="text-center">{{ $data->getCell('K'.(48 + $i))->getFormattedValue() }}</td>
                                            <td class="text-center">{{ $data->getCell('L'.(48 + $i))->getFormattedValue() }}</td>
                                            @if ($i == 1)
                                                <td class="text-center" rowspan="5">{{ $data->getCell('M49')->getFormattedValue() }}</td>
                                            @endif
                                            <td class="text-center">{{ $data->getCell('N'.(48 + $i))->getFormattedValue() }}</td>
                                            <td class="text-center">{{ $data->getCell('O'.(48 + $i))->getFormattedValue() }}</td>
                                        </tr>
                                    @endfor
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
                            <th class="text-left">Pengukuran Tekanan Hisap Maksimum</th>
                        </tr>
                        <tr>
                            <td class="full-width">
                                <table class="result-table">
                                    <tr>
                                        <th class="text-center" style="padding-left: 15px; padding-right: 15px">Parameter</th>
                                        <th class="text-center">Hasil Ukur</th>
                                        <th class="text-center" style="padding-left: 15px; padding-right: 15px">Toleransi (mmHg)</th>
                                    </tr>
                                    <tr>
                                        <td class="text-center">{{ $data->getCell('B58')->getFormattedValue() }}</td>
                                        <td class="text-center">{{ $data->getCell('F58')->getFormattedValue() }}</td>
                                        <td class="text-center symbol">
                                            {{ $data->getCell('H58')->getFormattedValue() }} <br>
                                            {{ $data->getCell('H59')->getFormattedValue() }}
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </tr>
            </table>
    
            <table class="top-margin-spacer">
                <?php $rowspan = 1; ?>
                @for ($i = 61; $i <= 64; $i++)
                    @if ($data->getCell('B'.$i)->getFormattedValue() != "")
                        <?php $rowspan++; ?>
                    @endif
                @endfor
                <tr>
                    <th class="text-left" rowspan="{{ $rowspan }}" style="width: 25px">V.</th>
                    <th style="text-align: left">Keterangan</th>
                </tr>
                @for ($i = 61; $i <= 64; $i++)
                    @if ($data->getCell('B'.$i)->getFormattedValue() != "")
                        <tr><td class="full-width">{{ $data->getCell('B'.$i)->getFormattedValue() }}</td></tr>
                    @endif
                @endfor
            </table>
    
            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="3" style="width: 25px">VI.</th>
                    <th class="text-left">Alat Ukur Yang Digunakan</th>
                </tr>
                <tr><td class="full-width">{{ $data->getCell('B69')->getFormattedValue() }}</td></tr>
                <tr><td class="full-width">{{ $data->getCell('B70')->getFormattedValue() }}</td></tr>
            </table>
    
            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="2" style="width: 25px">VI.</th>
                    <th class="text-left">Kesimpulan</th>
                </tr>
                <tr><td class="full-width">
                    {{ $data->getCell('B73')->getFormattedValue() }}
                </td></tr>
            </table>
    
            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="2" style="width: 25px">VIII.</th>
                    <th class="text-left">Petugas Kalibrasi</th>
                </tr>
                <tr><td class="full-width">{{ $data->getCell('B76')->getFormattedValue() }}</td></tr>
            </table>
    
            <div style="width: 100%;">
                <table class="top-margin-spacer" style="margin-right: 90px; float: right">
                    <tr>
                        <td class="text-left">Menyetujui, <br> Kepala Instalasi Laboratorium<br>Pengujian dan Kalibrasi</td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('img/choirul_huda_DS.jpg') }}" alt="" style="width: 113px; height: 113px; margin-top:10px">
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