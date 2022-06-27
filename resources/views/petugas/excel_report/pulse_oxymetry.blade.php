<!DOCTYPE html>
<html>
    <head>
        <title>LAPORAN KALIBRASI Fetal Doppler</title>
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
                    <td>: {{ $data->getCell('E4')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Model/Tipe</td>
                    <td>: {{ $data->getCell('E5')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">No. Seri</td>
                    <td>: {{ $data->getCell('E6')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Tanggal Penerimaan Alat</td>
                    <td>: {{ $data->getCell('E7')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Tanggal Kalibrasi</td>
                    <td>: {{ $data->getCell('E8')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Tempat Kalibrasi</td>
                    <td>: {{ $data->getCell('E9')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Nama Ruang</td>
                    <td>: {{ $data->getCell('E10')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Metode Kerja</td>
                    <td>: {{ $data->getCell('E11')->getFormattedValue() }}</td>
                </tr>
            </table>
            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="4" style="width: 25px">I.</th>
                    <th class="text-left" colspan="2">Kondisi Ruang</th>
                </tr>
                <tr>
                    <td style="width: 109px">1. Suhu</td>
                    <td>
                        : {{ $data->getCell('E14')->getFormattedValue()
                        ." ".$data->getCell('F14')->getFormattedValue()
                        ." ".$data->getCell('G14')->getFormattedValue()
                        ." ".$data->getCell('H14')->getFormattedValue() }}
                    </td>
                </tr>
                <tr>
                    <td style="width: 109px">2. Kelembapan</td>
                    <td>
                        : {{ $data->getCell('E15')->getFormattedValue()
                        ." ".$data->getCell('F15')->getFormattedValue()
                        ." ".$data->getCell('G15')->getFormattedValue()
                        ." ".$data->getCell('H15')->getFormattedValue() }}
                    </td>
                </tr>
                <tr>
                    <td style="width: 109px">3. Tegangan Jala - jala</td>
                    <td>
                        : {{ $data->getCell('E16')->getFormattedValue()
                        ." ".$data->getCell('F16')->getFormattedValue() }}
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
                    <td>: {{ $data->getCell('E19')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 109px">2. Fungsi</td>
                    <td>: {{ $data->getCell('E20')->getFormattedValue() }}</td>
                </tr>
            </table>
    
            {{-- Hasil Pengujian Keselamatan Listrik --}}
            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="2" style="width: 25px">III.</th>
                    <th class="text-left" colspan="2">Pengujian keselamatan Listrik</th>
                </tr>
                <tr>
                    <td style="width: 100%">
                        <table class="result-table">
                            <tr>
                                <th style="width: 5%">No.</th>
                                <th style="width: 62%">Parameter</th>
                                <th style="width: 15%">Hasil Ukur</th>
                                <th style="width: 18%">Ambang Batas yang Diizinkan</th>
                            </tr>
                            @for ($i = 1; $i <= 3; $i++)
                                <tr>
                                    <td class="text-center">{{ $i }}</td>
                                    <td>{{ $data->getCell('C'.($i + 24))->getFormattedValue() }}</td>
                                    <td class="text-center">
                                        {{ $data->getCell('I'.($i + 24))->getFormattedValue() }} <span class="symbol">{{ $data->getCell('J'.($i + 24))->getFormattedValue() }}</span>
                                    </td>
                                    <td class="text-center symbol">{{ $data->getCell('K'.($i + 24))->getFormattedValue() }} </td>
                                </tr>
                            @endfor
                        </table>
                    </td>
                </tr>
            </table>
    
            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="6" style="width: 25px">IV.</th>
                    <th class="text-left" colspan="2">Pengujian Kinerja</th>
                </tr>
                <tr>
                    <table>
                        <tr>
                            <th rowspan="2" class="text-left" style="width: 20px">A.</th>
                            <th class="text-left">Kalibrasi Akurasi Saturasi Oksigen</th>
                        </tr>
                        <tr>
                            <td class="full-width">
                                <table class="result-table">
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Parameter</th>
                                        <th class="text-center">Setting Standar</th>
                                        <th class="text-center">Pembacaan <br> Alat</th>
                                        <th class="text-center">Koreksi</th>
                                        <th class="text-center">Toleransi</th>
                                        <th class="text-center">Ketidakpastian <br> Pengukuran</th>
                                    </tr>
                                    @for ($i = 1; $i <= 7; $i++)
                                        <tr>
                                            <td class="text-center">{{ $i }}</td>
                                            @if ($i == 1)
                                                <td rowspan="7" class="text-center symbol">
                                                    {{ $data->getCell('C32')->getFormattedValue() }}
                                                </td>
                                            @endif
                                            @foreach (['D', 'F', 'G'] as $letter)
                                                <td class="text-center">{{ $data->getCell($letter.($i + 31))->getFormattedValue() }}</td>
                                            @endforeach
                                            @if ($i == 1)
                                                <td rowspan="7" class="text-center symbol">{{ $data->getCell('H32')->getFormattedValue() }}</td>
                                            @endif
                                            <td class="text-center">{{ $data->getCell('I'.($i + 31))->getFormattedValue(). " ". $data->getCell('J'.($i + 31))->getFormattedValue() }}</td>
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
                            <th class="text-left">Kalibrasi Akurasi Heart Rate</th>
                        </tr>
                        <tr>
                            <td class="full-width">
                                <table class="result-table">
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Parameter</th>
                                        <th class="text-center">Setting Standar</th>
                                        <th class="text-center">Pembacaan <br> Alat</th>
                                        <th class="text-center">Koreksi</th>
                                        <th class="text-center">Toleransi</th>
                                        <th class="text-center">Ketidakpastian <br> Pengukuran</th>
                                    </tr>
                                    @for ($i = 1; $i <= 4; $i++)
                                        <tr>
                                            <td class="text-center">{{ $i }}</td>
                                            @if ($i == 1)
                                                <td rowspan="4" class="text-center">
                                                    Heart Rate <br> (BPM)
                                                </td>
                                            @endif
                                            @foreach (['D', 'F', 'G'] as $letter)
                                                <td class="text-center">{{ $data->getCell($letter.($i + 42))->getFormattedValue() }}</td>
                                            @endforeach
                                            @if ($i == 1)
                                                <td rowspan="4" class="text-center">{{ $data->getCell('H43')->getFormattedValue() }}</td>
                                            @endif
                                            <td class="text-center">{{ $data->getCell('I'.($i + 42))->getFormattedValue(). " ". $data->getCell('J'.($i + 42))->getFormattedValue() }}</td>
                                        </tr>
                                    @endfor
                                </table>
                            </td>
                        </tr>
                    </table>
                </tr>
            </table>

            <table class="top-margin-spacer">
                <?php $rowspan = 1; ?>
                @for ($i = 49; $i <= 53; $i++)
                    @if ($data->getCell('B'.$i)->getFormattedValue() != "-" || $data->getCell('B'.$i)->getFormattedValue() != "")
                        <?php $rowspan++; ?>
                    @endif
                @endfor
                <tr>
                    <th class="text-left" rowspan="{{ $rowspan }}" style="width: 25px">V.</th>
                    <th style="text-align: left">Keterangan</th>
                </tr>
                @for ($i = 49; $i <= 53; $i++)
                    @if ($data->getCell('B'.$i)->getFormattedValue() != "-")
                        <tr><td class="full-width symbol">{{ $data->getCell('B'.$i)->getFormattedValue() }}</td></tr>
                    @endif
                @endfor
            </table>
    
            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="3" style="width: 25px">VI.</th>
                    <th class="text-left">Alat Ukur Yang Digunakan</th>
                </tr>
                <tr><td class="full-width symbol">{{ $data->getCell('B56')->getFormattedValue() }}</td></tr>
                <tr><td class="full-width">{{ $data->getCell('B57')->getFormattedValue() }}</td></tr>
            </table>
    
            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="2" style="width: 25px">VII.</th>
                    <th class="text-left">Kesimpulan</th>
                </tr>
                <tr><td class="full-width">
                    {{ $data->getCell('B60')->getFormattedValue() }}
                </td></tr>
            </table>
    
            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="2" style="width: 25px">VII.</th>
                    <th class="text-left">Petugas Kalibrasi</th>
                </tr>
                <tr><td class="full-width">{{ $data->getCell('B64')->getFormattedValue() }}</td></tr>
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