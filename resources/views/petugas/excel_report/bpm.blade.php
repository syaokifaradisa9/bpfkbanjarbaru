<!DOCTYPE html>
<html>
    <head>
        <title>LAPORAN KALIBRASI INFUSION PUMP</title>
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
                    <td style="width: 137px"><p style="font-family: Arial, Helvetica, sans-serif">Merek</p></td>
                    <td>: {{ $data->getCell('F4')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Model/Tipe</td>
                    <td>: {{ $data->getCell('F5')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">No. Seri</td>
                    <td>: {{ $data->getCell('F6')->getFormattedValue() }}</td>
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
                    <td>: {{ $data->getCell('D10')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 137px">Metode Kerja</td>
                    <td>: {{ $data->getCell('F11')->getFormattedValue() }}</td>
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
            </table>
    
            {{-- Pemeriksaan Kondisi Fisik dan Fungsi Alat --}}
            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="3" style="width: 25px">II.</th>
                    <th class="text-left" colspan="2">Pemeriksaan Kondisi Fisik dan Fungsi Alat</th>
                </tr>
                <tr>
                    <td style="width: 109px">1. Fisik</td>
                    <td>: {{ $data->getCell('F18')->getFormattedValue() }}</td>
                </tr>
                <tr>
                    <td style="width: 109px">2. Fungsi</td>
                    <td>: {{ $data->getCell('F19')->getFormattedValue() }}</td>
                </tr>
            </table>
    
            {{-- Hasil Pengujian Keselamatan Listrik --}}
            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="12" style="width: 25px">III.</th>
                    <th class="text-left" colspan="2" >Pengujian Kinerja</th>
                </tr>
                <tr>
                    <table>
                        <tr>
                            <th rowspan="2" class="text-left" style="width: 20px">A.</th>
                            <th class="text-left">Daya Ulang Pembacaan</th>
                        </tr>
                        <tr>
                            <td class="full-width">
                                <table class="result-table">
                                    <tr>
                                        <th>Standar (kg)</th>
                                        <th>Pembacaan Alat (kg)</th>
                                        <th>Simpangan Baku</th>
                                        <th>Toleransi</th>
                                        <th>Ketidakpastian Pengukuran</th>
                                    </tr>
                                    @for ($i = 27; $i <= 28; $i++)
                                        <tr>
                                            <td class="text-center">{{ $data->getCell('B'.$i)->getFormattedValue() }}</td>
                                            <td class="text-center">{{ $data->getCell('C'.$i)->getFormattedValue() }}</td>
                                            <td class="text-center">{{ $data->getCell('G'.$i)->getFormattedValue() }}</td>
                                            @if ($i == 27)
                                                <td class="text-center" rowspan="2">{{ $data->getCell('I27')->getFormattedValue() }}</td>
                                            @endif
                                            <td class="text-center">{{ $data->getCell('K'.$i)->getFormattedValue()." ".$data->getCell('L'.$i)->getFormattedValue() }}</td>
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
                            <th class="text-left">Penyimpangan Penunjukan</th>
                        </tr>
                        <tr>
                            <td class="full-width">
                                <table class="result-table">
                                    <tr>
                                        <th>Standar (kg)</th>
                                        <th>Pembacaan Alat (kg)</th>
                                        <th>Koreksi</th>
                                        <th>Toleransi</th>
                                        <th>Ketidakpastian Pengukuran</th>
                                    </tr>
                                    <?php $standards = [1, 2, 3, 5, 10] ?>
                                    @foreach ($standards as $standard)
                                        <tr>
                                            <td class="text-center">{{ $standard }}</td>
                                            <td class="text-center">{{ $data->getCell('C'.($standard + 31))->getFormattedValue() }}</td>
                                            <td class="text-center">{{ $data->getCell('G'.($standard + 31))->getFormattedValue() }}</td>
                                            @if ($standard == 1)
                                                <td class="text-center" rowspan="5">{{ $data->getCell('I32')->getFormattedValue() }}</td>
                                            @endif
                                            <td class="text-center">{{ $data->getCell('K'.($standard + 31))->getFormattedValue()." ".$data->getCell('L'.($standard + 31))->getFormattedValue() }}</td>
                                        </tr>
                                    @endforeach
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
                            <th class="text-left">Efek Pembebanan Tidak di Pusat Pan</th>
                        </tr>
                        <tr>
                            <td class="full-width">
                                <table class="result-table">
                                    <tr>
                                        <th>(0) Pusat</th>
                                        <th>(1) Depan</th>
                                        <th>(2) Kiri</th>
                                        <th>(3) Belakang</th>
                                        <th>(4) Kanan</th>
                                    </tr>
                                    <tr>
                                        <td class="text-center">{{ $data->getCell('B45')->getFormattedValue() }}</td>
                                        <td class="text-center">{{ $data->getCell('C45')->getFormattedValue() }}</td>
                                        <td class="text-center">{{ $data->getCell('G45')->getFormattedValue() }}</td>
                                        <td class="text-center">{{ $data->getCell('I45')->getFormattedValue() }}</td>
                                        <td class="text-center">{{ $data->getCell('K45')->getFormattedValue() }}</td>
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
                            <th rowspan="2" class="text-left" style="width: 20px">D.</th>
                            <th class="text-left">Evaluasi Kinerja Timbangan Bayi Berdasarkan LOP</th>
                        </tr>
                        <tr>
                            <td class="full-width">
                                <table class="result-table">
                                    <tr>
                                        <th>Koreksi Maksimum (kg)</th>
                                        <th>Ketidakpastian Maksimum (kg)</th>
                                        <th>Limit of Performance (kg)</th>
                                    </tr>
                                    <tr>
                                        <td class="text-center">{{ $data->getCell('B49')->getFormattedValue() }}</td>
                                        <td class="text-center">{{ $data->getCell('C49')->getFormattedValue() }}</td>
                                        <td class="text-center">{{ $data->getCell('G49')->getFormattedValue() }}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </tr>
            </table>
    
            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="3" style="width: 25px">IV.</th>
                    <th style="text-align: left">Keterangan</th>
                </tr>
                <tr><td class="full-width">{{ $data->getCell('B52')->getFormattedValue() }}</td></tr>
                <tr><td class="full-width">{{ $data->getCell('B53')->getFormattedValue() }}</td></tr>
            </table>
    
            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="5" style="width: 25px">V.</th>
                    <th class="text-left">Alat Ukur Yang Digunakan</th>
                </tr>
                @for ($i = 57; $i <= 60; $i++)
                    <tr><td class="full-width">{{ $data->getCell('B'.$i)->getFormattedValue() }}</td></tr>
                @endfor
            </table>
    
            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="2" style="width: 25px">VI.</th>
                    <th class="text-left">Kesimpulan</th>
                </tr>
                <tr><td class="full-width">
                    {{ $data->getCell('B63')->getFormattedValue() }}
                </td></tr>
            </table>
    
            <table class="top-margin-spacer">
                <tr>
                    <th class="text-left" rowspan="2" style="width: 25px">VII.</th>
                    <th class="text-left">Petugas Kalibrasi</th>
                </tr>
                <tr><td class="full-width">
                    {{ $data->getCell('B67')->getFormattedValue() }}
                </td></tr>
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