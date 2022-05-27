@extends('templates.app')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Lembar Kerja {{ $alkesOrder->alkes->name }}</h1>
    </div>

    <div class="section-body">
      <h2 class="section-title">Pengajuan Eksternal Pengujian dan Kalibrasi Alat Kesehatan</h2>
      <p class="section-lead">Melakukan pengujian dan kalibrasi di Loka Pengamanan Fasilitas Kesehatan (LPFK) Banjarbaru</p>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Form Lembar Kerja</h4>
            </div>

            {{-- Informasi Sertifikat --}}
            <div class="card-body px-4">
              <div class="row">
                <div class="form-group col-2">
                  <label><b>Nomor Sertifikat</b></label>
                  <input type="number" class="form-control" value="{{ $certificate_number }}">
                </div>
                <div class="form-group col-2">
                  <label><b>Bulan Sertifikat</b></label>
                  <input type="month" class="form-control" value="{{ date('Y-m', time()) }}">
                </div>
                <div class="form-group ml-3">
                  <label><b>Nomor Order</b></label>
                  <input type="text" class="form-control" value="{{ $alkesOrder->external_order->number }}" readonly>
                </div>
              </div>

              <div class="row mt-3">
                <div class="col">
                  <div class="form-group">
                    {{-- Informasi Alat Kesehatan --}}
                    <label><b>Informasi Alat Kesehatan</b></label>
                    <input type="text" placeholder="Merek" class="form-control">
                    <input type="text" placeholder="Tipe Model" class="form-control mt-2">
                    <input type="text" placeholder="Nomor Seri" class="form-control mt-2">
                    <div class="row mt-2 mx-0">
                      <input type="text" placeholder="Resolusi (L/min)" class="form-control col">
                      <div class="col-5 text-center pt-2">
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                          <label class="custom-control-label" for="customRadioInline1">Analog</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                          <label class="custom-control-label" for="customRadioInline2">Digital</label>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                </div>
                <div class="form-group col">
                  {{-- Kondisi Ruangan --}}
                  <label><b>Kondisi Ruangan</b></label>
                  <div class="row mx-0">
                    <input type="text" placeholder="Suhu Awal" class="form-control col">
                    <input type="text" placeholder="Suhu Akhir" class="form-control col ml-3">
                  </div>
                  <div class="row mx-0 mt-2">
                    <input type="text" placeholder="Kelembapan Awal" class="form-control col">
                    <input type="text" placeholder="Kelembapan Akhir" class="form-control col ml-3">
                  </div>
                  <input type="text" placeholder="Tegangan Jala-jala" class="form-control mt-2">
                </div>
              </div>

              <div class="row mt-3">
                <div class="form-group col-3">
                  <label><b>Tanggal Penerimaan Alat</b></label>
                  <input type="date" class="form-control" value="{{ date('Y-m-d', time()) }}">
                </div>
                <div class="form-group col-3">
                  <label><b>Tanggal Kalibrasi</b></label>
                  <input type="date" class="form-control" value="{{ date('Y-m-d', time()) }}">
                </div>
                <div class="form-group col-3">
                  <label><b>Tempat Kalibrasi</b></label>
                  <input type="text" class="form-control" value="{{ $alkesOrder->external_order->user->fasyenkes_name }}">
                </div>
                <div class="form-group col-3">
                  <label><b>Nama Ruang</b></label>
                  <input type="text" class="form-control">
                </div>
              </div>

              <div class="row mt-3">
                <div class="col-2 mx-0 form-group">
                  <label><b>Kondisi Alat</b></label>
                  <div class="custom-control custom-radio">
                    <input type="radio" id="a" name="a" class="custom-control-input">
                    <label class="custom-control-label" for="a">Baik</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input type="radio" id="b" name="a" class="custom-control-input">
                    <label class="custom-control-label" for="b">Tidak Baik</label>
                  </div>
                </div>
                <div class="col-2 mx-0 form-group">
                  <label><b>Kondisi Alat</b></label>
                  <div class="custom-control custom-radio">
                    <input type="radio" id="c" name="b" class="custom-control-input">
                    <label class="custom-control-label" for="c">Baik</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input type="radio" id="d" name="b" class="custom-control-input">
                    <label class="custom-control-label" for="d">Tidak Baik</label>
                  </div>
                </div>
                <div class="col"></div>
              </div>

              <div class="form-group mt-3">
                <label><b>Hasil Pengujian Keselamatan Listrik</b></label>
                <table class="table table-bordered table-md">
                  <tr>
                    <th>No</th>
                    <th>Parameter</th>
                    <th>Hasil Ukur</th>
                  </tr>
                  <tr>
                    <td class="text-center align-middle">1</td>
                    <td class="align-middle">Resistansi Isolasi</td>
                    <td>
                      <input type="text" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center align-middle">2</td>
                    <td class="align-middle">
                      <select class="form-control">
                        <option>Resistansi Pembumian Protektif (kabel dapat dilepas)</option>
                        <option>Resistansi Pembumian Protektif (kabel tidak dapat dilepas)</option>
                      </select>
                    </td>
                    <td>
                      <input type="text" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center align-middle">3</td>
                    <td class="align-middle">
                      <select class="form-control">
                        <option>Arus bocor peralatan untuk perangkat elektromedik kelas I</option>
                        <option>Arus bocor peralatan untuk perangkat elektromedik kelas II</option>
                      </select>
                    </td>
                    <td>
                      <input type="text" class="form-control">
                    </td>
                  </tr>
                </table>
              </div>

              <div class="form-group mt-3">
                <label><b>Pengujian Kinerja Kalibrasi Kecepatan</b></label>
                <table class="table table-bordered table-md">
                  <tr>
                    <th rowspan="2" class="text-center align-middle">No</th>
                    <th rowspan="2" class="text-center align-middle">Parameter</th>
                    <th rowspan="2" class="text-center align-middle">Setting Alat</th>
                    <th colspan="6" class="text-center align-middle">Pembacaan Standar</th>
                  </tr>
                  <tr>
                    <th class="text-center">I</th>
                    <th class="text-center">II</th>
                    <th class="text-center">III</th>
                    <th class="text-center">IV</th>
                    <th class="text-center">V</th>
                    <th class="text-center">VI</th>
                  </tr>
                  @for ($i = 0; $i < 4; $i++)
                    <tr>
                      <td>{{ $i + 1 }}</td>
                      @if ($i == 0)
                        <td rowspan="4" class="text-center align-middle">Kecepatan Putaran<br>(RPM)</td>
                      @endif
                      @for ($j = 0; $j < 7; $j++)
                        <td>
                          <input type="text" class="form-control">
                        </td>
                      @endfor
                    </tr>
                  @endfor
                </table>
              </div>

              <div class="form-group mt-3">
                <label><b>Pengujian Akurasi Waktu Putar</b></label>
                <table class="table table-bordered table-md">
                  <tr>
                    <th rowspan="2" class="text-center align-middle">No</th>
                    <th rowspan="2" class="text-center align-middle">Parameter</th>
                    <th rowspan="2" class="text-center align-middle">Setting Alat</th>
                    <th colspan="3" class="text-center align-middle">Pembacaan Standar</th>
                  </tr>
                  <tr>
                    <th class="text-center">I</th>
                    <th class="text-center">II</th>
                    <th class="text-center">III</th>
                  </tr>
                  <tr>
                    <td class="text-center align-middle">5</td>
                    <td class="text-center align-middle">Waktu (s)</td>
                    @for ($i=0; $i<4; $i++)
                      <td>
                        <input type="text" class="form-control">
                      </td>
                    @endfor
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection