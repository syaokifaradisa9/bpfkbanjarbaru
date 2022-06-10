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
            <form action="{{ route('petugas.order.external.worksheet.excel.store', ['order_id' => $order_id, 'alkes_order_id' => $alkesOrder->id]) }}" method="post">
              @csrf

              <div class="card-body px-4">
                <div class="row">
                  <div class="form-group col-2">
                    <label><b>Nomor Sertifikat</b></label>
                    <input type="number" class="form-control" value="{{ $certificate_number }}" name="certificate_number">
                  </div>
                  <div class="form-group col-2">
                    <label><b>Bulan Sertifikat</b></label>
                    <input type="month" class="form-control" name="certificate_date" value="{{ date('Y-m', strtotime($certificate_month ?? now())) }}">
                  </div>
                  <div class="form-group ml-3">
                    <label><b>Nomor Order</b></label>
                    <input type="text" class="form-control" value="{{ $alkesOrder->external_order->number }}" name="order_number" readonly>
                  </div>
                </div>
  
                <div class="mt-3">
                  <div class="row">
                    <div class="form-group col">
                      <label><b>Merek Alat</b></label>
                      <input name="E5" type="text" placeholder="Merek" class="form-control" value="{{ $excel_value['E5'] ?? '' }}">
                    </div>
                    <div class="form-group col">
                      <label><b>Tipe/Model Alat</b></label>
                      <input name="E6" type="text" placeholder="Tipe/Model" class="form-control" value="{{ $excel_value['E6'] ?? '' }}">
                    </div>
                    <div class="form-group col">
                      <label><b>Nomor Seri</b></label>
                      <input name="E7" type="text" placeholder="Nomor Seri" class="form-control" value="{{ $excel_value['E7'] ?? '' }}">
                    </div>
                    <div class="form-group col">
                      <label><b>Resolusi</b></label>
                      <div class="row mx-0">
                        <input name="E8" type="text" placeholder="Resolusi" class="form-control col" value="{{ $excel_value['E8'] ?? '' }}">
                        <div class="col-4 text-center pt-2">L/min
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-3">
                      <label><b>Tanggal Penerimaan Alat</b></label>
                      <input name="E9" type="date" class="form-control" value="{{ $excel_value['E9'] ?? date('Y-m-d', time()) }}">
                    </div>
                    <div class="form-group col-3">
                      <label><b>Tanggal Kalibrasi</b></label>
                      <input name="E10" type="date" class="form-control" value="{{ $excel_value['E10'] ?? date('Y-m-d', time()) }}">
                    </div>
                    <div class="form-group col-3">
                      <label><b>Tempat Kalibrasi</b></label>
                      <input name="E11" type="text" class="form-control" value="{{ $alkesOrder->external_order->user->fasyenkes_name }}">
                    </div>
                    <div class="form-group col-3">
                      <label><b>Nama Ruang</b></label>
                      <input name="E12" type="text" class="form-control" value="{{ $excel_value['E12'] ?? '' }}">
                    </div>
                  </div>
                </div>
  
                <div class="row mt-3">
                  <div class="form-group col-3">
                    <label><b>Suhu Awal</b></label>
                    <input name="E17" type="text" placeholder="Suhu Awal" class="form-control col" value="{{ $excel_value['E17'] ?? '' }}">
                  </div>
                  <div class="form-group col-3">
                    <label><b>Suhu Akhir</b></label>
                    <input name="F17" type="text" placeholder="Suhu Akhir" class="form-control col" value="{{ $excel_value['F17'] ?? '' }}">
                  </div>
                  <div class="form-group col-3">
                    <label><b>Kelembapan Awal</b></label>
                    <input name="E18" type="text" placeholder="Kelembapan Awal" class="form-control col" value="{{ $excel_value['E18'] ?? '' }}">
                  </div>
                  <div class="form-group col-3">
                    <label><b>Kelembapan Akhir</b></label>
                    <input name="F18" type="text" placeholder="Kelembapan Akhir" class="form-control col" value="{{ $excel_value['F18'] ?? '' }}">
                  </div>
                </div>

                <div class="row mt-3">
                  <div class="col-2 mx-0 form-group">
                    <label><b>Kondisi Alat</b></label>
                    <div class="custom-control custom-radio">
                      <input name="E21" value="Baik" type="radio" id="E21-a" class="custom-control-input"
                        @if (isset($excel_value))
                          @if($excel_value['E21'] == "Baik") checked @endif
                        @endif>
                      <label class="custom-control-label" for="E21-a">Baik</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="E21" value="Tidak Baik" type="radio" id="E21-b" class="custom-control-input"
                        @if (isset($excel_value))
                          @if($excel_value['E21'] == "Tidak Baik") checked @endif
                        @endif>
                      <label class="custom-control-label" for="E21-b">Tidak Baik</label>
                    </div>
                  </div>
                  <div class="col-2 mx-0 form-group">
                    <label><b>Fungsi Alat</b></label>
                    <div class="custom-control custom-radio">
                      <input name="E22" value="Baik" type="radio" id="E22-a" class="custom-control-input"
                        @if (isset($excel_value))
                          @if($excel_value['E21'] == "Baik") checked @endif
                        @endif>
                      <label class="custom-control-label" for="E22-a">Baik</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="E22" value="Tidak Baik" type="radio" id="E22-b" class="custom-control-input"
                        @if (isset($excel_value))
                          @if($excel_value['E22'] == "Tidak Baik") checked @endif
                        @endif
                      >
                      <label class="custom-control-label" for="E22-b">Tidak Baik</label>
                    </div>
                  </div>
                  <div class="col"></div>
                </div>
  
                <div class="form-group mt-3">
                  <label><b>Pengujian Kinerja</b></label>
                  <table class="table table-bordered table-md">
                    <tr>
                      <td class="text-center align-middle" rowspan="2" style="width: 200px">
                        <b>Parameter</b>
                      </td>
                      <td class="text-center align-middle" rowspan="2">
                        <b>Setting<br>Alat</b>
                      </td>
                      <td class="text-center align-middle" colspan="5">
                        <b>Nilai Pembacaan Standar (ml/min)</b>
                      </td>
                      <td class="text-center align-middle" rowspan="2" style="width: 200px">
                        <b>Toleransi<br>Alat</b>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center">I</td>
                      <td class="text-center">II</td>
                      <td class="text-center">III</td>
                      <td class="text-center">IV</td>
                      <td class="text-center">V</td>
                    </tr>
                    @for ($i = 1; $i <= 7; $i++)
                      <tr>
                        @if ($i == 1)
                          <td class="text-center align-middle" rowspan="7">
                            <b>
                              Flow (L/min)
                            </b>
                          </td>
                        @endif
                        <td class="text-center align-middle">{{ $i }}</td>
                        @foreach (['E', 'F', 'G', 'H', 'I'] as $letter)
                          <td class="text-center align-middle">
                            <input name="{{ $letter.($i + 26) }}" type="text" class="form-control text-center align-middle" value="{{ $excel_value[$letter.($i + 26)] ?? '' }}">
                          </td>
                        @endforeach
                        @if ($i == 1)
                          <td class="text-center align-middle" rowspan="7">
                            <b>
                              &#177; 10 %
                            </b>
                          </td>
                        @endif
                      </tr>
                    @endfor
                  </table>
                </div>
  
                <div class="form-group mt-3">
                  <label><b>Keterangan Pembacaan Skala</b></label>
                  <select name="B38" class="form-control">
                    <option value="Pembacaan skala diatas bola"
                      @if (isset($excel_value))
                        @if($excel_value['B38'] == "Pembacaan skala diatas bola") selected @endif
                      @endif>
                      Diatas bola
                    </option>
                    <option value="Pembacaan skala ditengah bola"
                      @if (isset($excel_value))
                        @if($excel_value['B38'] == "Pembacaan skala ditengah bola") selected @endif
                      @endif>
                      Ditengah bola
                    </option>
                    <option value="Pembacaan skala dibawah bola"
                      @if (isset($excel_value))
                        @if($excel_value['B38'] == "Pembacaan skala dibawah bola") selected @endif
                      @endif>
                      Dibawah bola
                    </option>
                  </select>
                </div>

                <div class="form-group mt-3 mb-0 row">
                  @foreach ($measuringInstruments as $index => $group)
                      <div class="form-group col">
                        <label><b>{{ 'Alat Ukur '. $group['name'] }}</b></label>
                        <select name="{{ 'B'.(41 + $index) }}" class="form-control">
                          <option disabled selected hidden>Pilih Alat Ukur</option>
                          @foreach ($group['instruments'] as $instrument)
                            <option value="{{$instrument}}"
                            @if (isset($excel_value))
                              @if($excel_value['B'.(41 + $index)] == $instrument) selected @endif
                            @endif>
                              {{$instrument}}
                            </option>
                          @endforeach
                        </select>
                      </div>
                    @endforeach
                </div>
                
                <div class="form-group">
                  <label><b>Petugas Kalibrasi</b></label>
                  <select name="B49" class="form-control">
                    @foreach ($officers as $officer)
                      <option value="{{ $officer }}" @if ($officer == Auth::guard('admin')->user()->name) selected @endif>
                        {{$officer}}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary px-3">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection