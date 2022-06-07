<!DOCTYPE html>
<html>
    <head>
        <title>LAPORAN KALIBRASI PATIENT MONITOR</title>
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
                    <td>: {{ $data->getCell('D4')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Model/Tipe</td>
                    <td>: {{ $data->getCell('D5')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">No. Seri</td>
                    <td>: {{ $data->getCell('D6')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Tanggal Penerimaan Alat</td>
                    <td>: {{ $data->getCell('D7')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Tanggal Kalibrasi</td>
                    <td>: {{ $data->getCell('D8')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Tempat Kalibrasi</td>
                    <td>: {{ $data->getCell('D9')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Nama Ruang</td>
                    <td>: {{ $data->getCell('D10')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Metode Kerja</td>
                    <td>: {{ $data->getCell('D11')->getFormattedValue() }}</td>
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
                        : {{ $data->getCell('D14')->getFormattedValue()
                        ." ".$data->getCell('E14')->getFormattedValue()
                        ." ".$data->getCell('F14')->getFormattedValue()
                        ." ".$data->getCell('G14')->getFormattedValue() }}
                    </td>
                </tr>
                <tr>
                    <td style="width: 109px">2. Kelembapan</td>
                    <td class="symbol">
                        : {{ $data->getCell('D15')->getFormattedValue()
                        ." ".$data->getCell('E15')->getFormattedValue()
                        ." ".$data->getCell('F15')->getFormattedValue()
                        ." ".$data->getCell('G15')->getFormattedValue() }}
                    </td>
                </tr>
                <tr>
                    <td style="width: 109px">3. Tegangan Jala - jala</td>
                    <td class="symbol">
                        : {{ $data->getCell('D16')->getFormattedValue()
                        ." ".$data->getCell('E16')->getFormattedValue()
                        ." ".$data->getCell('F16')->getFormattedValue()
                        ." ".$data->getCell('G16')->getFormattedValue() }}
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
                    <td>: {{ $data->getCell('D19')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 109px">2. Fungsi</td>
                    <td>: {{ $data->getCell('D20')->getFormattedValue() }}</td>
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
                                <th style="width: 62%">Parameter</th>
                                <th style="width: 15%">Hasil Ukur</th>
                                <th style="width: 18%">Ambang Batas yang Diizinkan</th>
                            </tr>
                            @for ($i = 1; $i <= 4; $i++)
                                <tr>
                                    <td class="text-center">{{ $i }}</td>
                                    <td>{{ $data->getCell('C'.($i + 24))->getFormattedValue() }}</td>
                                    <td class="text-center symbol">
                                        {{ $data->getCell('I'.($i + 24))->getFormattedValue()." ".$data->getCell('J'.($i + 24))->getFormattedValue() }} </span>
                                    </td class="symbol">
                                    <td class="text-center symbol">{{ $data->getCell('K'.($i + 24))->getFormattedValue()." ".$data->getCell('L'.($i + 24))->getFormattedValue() }} </td>
                                </tr>
                            @endfor
                        </table>
                    </td>
                </tr>
            </table>
    
            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="12" style="width: 25px">IV.</th>
                    <th class="text-left" colspan="2" >Pengujian Kinerja</th>
                </tr>
                <tr>
                    <table>
                        <tr>
                            <th rowspan="2" class="text-left" style="width: 20px">A.</th>
                            <th class="text-left">Kalibrasi Pulse Rate</th>
                        </tr>
                        <tr>
                            <td class="full-width">
                                <table class="result-table">
                                    <tr>
                                        <th>No.</th>
                                        <th>Parameter</th>
                                        <th>Setting Standar</th>
                                        <th>Pembacaan Alat</th>
                                        <th>Koreksi</th>
                                        <th>Toleransi</th>
                                        <th>Ketidakpastian <br> Pengukuran</th>
                                    </tr>
                                    @for ($i = 1; $i <= 4; $i++)
                                        <tr>
                                            <td class="text-center">{{ $i }}</td>
                                            @if ($i == 1)
                                                <td class="text-center" rowspan="4">Pulse Rate (BPM)</td>
                                            @endif
                                            <td class="text-center">{{ $data->getCell('D'.($i + 35))->getFormattedValue() }}</td>
                                            <td class="text-center">{{ $data->getCell('E'.($i + 35))->getFormattedValue() }}</td>
                                            <td class="text-center">{{ $data->getCell('F'.($i + 35))->getFormattedValue() }}</td>
                                            @if ($i == 1)
                                                <td class="text-center" rowspan="4">{{ $data->getCell('G'.($i + 35))->getFormattedValue() }}</td>
                                            @endif
                                            <td class="text-center symbol">{{ $data->getCell('H'.($i + 35))->getFormattedValue()." ".$data->getCell('I'.($i + 35))->getCalculatedValue() }}</td>
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
                            <th class="text-left">Kalibrasi Pulse Oximetri</th>
                        </tr>
                        <tr>
                            <td class="full-width">
                                <table class="result-table">
                                    <tr>
                                        <th>No.</th>
                                        <th>Parameter</th>
                                        <th>Setting Standar</th>
                                        <th>Pembacaan Alat</th>
                                        <th>Koreksi</th>
                                        <th>Toleransi</th>
                                        <th>Ketidakpastian <br> Pengukuran</th>
                                    </tr>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <tr>
                                            <td class="text-center">{{ $i }}</td>
                                            @if ($i == 1)
                                                <td class="text-center" rowspan="5">SPO2 (%)</td>
                                            @endif
                                            <td class="text-center">{{ $data->getCell('D'.($i + 44))->getFormattedValue() }}</td>
                                            <td class="text-center">{{ $data->getCell('E'.($i + 44))->getFormattedValue() }}</td>
                                            <td class="text-center">{{ $data->getCell('F'.($i + 44))->getFormattedValue() }}</td>
                                            @if ($i == 1)
                                                <td class="text-center" rowspan="5">{{ $data->getCell('G'.($i + 44))->getFormattedValue() }}</td>
                                            @endif
                                            <td class="text-center symbol">{{ $data->getCell('H'.($i + 44))->getFormattedValue()." ".$data->getCell('I'.($i + 44))->getCalculatedValue() }}</td>
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
                            <th rowspan="2" class="text-left" style="width: 20px">C.</th>
                            <th class="text-left">Kalibrasi NIBP (Non Invasive Blood Pressure)</th>
                        </tr>
                        <tr>
                            <td class="full-width">
                                <table class="result-table">
                                    <tr>
                                        <th>No.</th>
                                        <th>Parameter <br> (mmHg)</th>
                                        <th>Setting Standar</th>
                                        <th>Pembacaan Alat</th>
                                        <th>Koreksi</th>
                                        <th>Toleransi</th>
                                        <th>Ketidakpastian <br> Pengukuran</th>
                                    </tr>
                                    @for ($i = 1; $i <= 4; $i++)
                                        @for ($j = 1; $j <= 2; $j++)
                                            <tr>
                                                @if ($j == 1)
                                                    <td rowspan="2" class="text-center">{{ $i }}</td>
                                                @endif
                                                <td>{{ ($j == 1) ? "Sistole" : "Diastole" }}</td>
                                                <td class="text-center">{{ $data->getCell('D'.($i + 53 + $j))->getFormattedValue() }}</td>
                                                <td class="text-center">{{ $data->getCell('E'.($i + 53 + $j))->getFormattedValue() }}</td>
                                                <td class="text-center">{{ $data->getCell('F'.($i + 53 + $j))->getFormattedValue() }}</td>
                                                @if ($i == 1 && $j == 1)
                                                    <td class="text-center" rowspan="8">{{ $data->getCell('G'.($i + 53 + $j))->getFormattedValue() }}</td>
                                                @endif
                                                <td class="text-center">{{ $data->getCell('H'.($i + 53 + $j))->getFormattedValue()." ".$data->getCell('I'.($i + 53 + $j))->getFormattedValue() }}</td>
                                            </tr>
                                        @endfor
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
                            <th rowspan="2" class="text-left" style="width: 20px">D.</th>
                            <th class="text-left">Kalibrasi Respirasi</th>
                        </tr>
                        <tr>
                            <td class="full-width">
                                <table class="result-table">
                                    <tr>
                                        <th>No.</th>
                                        <th>Parameter</th>
                                        <th>Setting <br> Standar</th>
                                        <th>Pembacaan <br> Alat</th>
                                        <th>Koreksi</th>
                                        <th>Toleransi</th>
                                        <th>Ketidakpastian <br> Pengukuran</th>
                                    </tr>
                                    @for ($i = 1; $i <= 4; $i++)
                                    <tr>
                                        <td class="text-center">{{ $i }}</td>
                                        @if ($i == 1)
                                            <td rowspan="4">Respirasi (BrPM)</td>
                                        @endif
                                        <td class="text-center">{{ $data->getCell('D'.($i + 67))->getFormattedValue() }}</td>
                                        <td class="text-center">{{ $data->getCell('E'.($i + 67))->getFormattedValue() }}</td>
                                        <td class="text-center">{{ $data->getCell('F'.($i + 67))->getFormattedValue() }}</td>
                                        @if ($i == 1)
                                            <td class="text-center" rowspan="4">{{ $data->getCell('G'.($i + 67))->getFormattedValue() }}</td>
                                        @endif
                                        <td class="text-center">{{ $data->getCell('H'.($i + 67))->getFormattedValue()." ".$data->getCell('I'.($i + 67))->getFormattedValue() }}</td>
                                    </tr>
                                    @endfor
                                </table>
                            </td>
                        </tr>
                    </table>
                </tr>
            </table>
    
            @for ($i = 0; $i < 5; $i++)
                <br>
            @endfor
            <table class="top-margin-spacer">
                <tr>
                    <?php $rowspan = 1;?>
                    @for ($i = 82; $i <= 91; $i++)
                        @if ($data->getCell('B'.$i)->getFormattedValue() != "")
                            <?php $rowspan++; ?>
                        @endif
                    @endfor
                    <th class="text-left" rowspan="{{ $rowspan }}" style="width: 25px">V.</th>
                    <th style="text-align: left">Keterangan</th>
                </tr>
                @for ($i = 82; $i <= 91; $i++)
                    @if ($data->getCell('B'.$i)->getFormattedValue() != "")
                        <tr><td class="full-width">{{ $data->getCell('B'.$i)->getFormattedValue() }}</td></tr>
                    @endif
                @endfor
            </table>
    
            <table class="top-margin-spacer">
                <tr>
                    <?php $rowspan = 1;?>
                    @for ($i = 93; $i <= 96; $i++)
                        @if ($data->getCell('B'.$i)->getFormattedValue() != "-")
                            <?php $rowspan++; ?>
                        @endif
                    @endfor
                    <th class="text-left" rowspan="{{ $rowspan }}" style="width: 25px">VI.</th>
                    <th class="text-left">Alat Ukur Yang Digunakan</th>
                    @for ($i = 93; $i <= 96; $i++)
                        @if ($data->getCell('B'.$i)->getFormattedValue() != "-")
                            <tr><td class="full-width">{{ $data->getCell('B'.$i)->getFormattedValue() }}</td></tr>
                        @endif
                    @endfor
                </tr>
            </table>
    
            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="2" style="width: 25px">VII.</th>
                    <th class="text-left">Kesimpulan</th>
                </tr>
                <tr><td class="full-width">
                    {{ $data->getCell('B99')->getFormattedValue() }}
                </td></tr>
            </table>
    
            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="2" style="width: 25px">VIII.</th>
                    <th class="text-left">Petugas Kalibrasi</th>
                </tr>
                <tr><td class="full-width">{{ $data->getCell('B102')->getFormattedValue() }}</td></tr>
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
            <p class="text-center" style="font-size: 7px; width: 100%">
                Dilarang keras mengutip dan atau mempublikasikan sebagian isi sertifikat ini tanpa seijin LPFK Banjarbaru <br>
                Sertifikat ini sah apabila dibubuhi cap LPFK Banjarbaru dan ditandatangani oleh pejabat yang berwenang
            </p>
        </div>
    </body>
</html>