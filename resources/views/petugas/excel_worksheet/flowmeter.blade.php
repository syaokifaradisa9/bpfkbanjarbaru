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
                    <input type="month" class="form-control" value="{{ date('Y-m', time()) }}" name="certificate_date">
                  </div>
                  <div class="form-group ml-3">
                    <label><b>Nomor Order</b></label>
                    <input type="text" class="form-control" value="{{ $alkesOrder->external_order->number }}" name="order_number" readonly>
                  </div>
                </div>
  
                <div class="row mt-3">
                  <div class="col">
                    <div class="form-group">
                      {{-- Informasi Alat Kesehatan --}}
                      <label><b>Informasi Alat Kesehatan</b></label>
                      <input name="E5" type="text" placeholder="Merek" class="form-control">
                      <input name="E6" type="text" placeholder="Tipe/Model" class="form-control mt-2">
                      <input name="E7" type="text" placeholder="Nomor Seri" class="form-control mt-2">
                      <div class="row mt-2 mx-0">
                        <input name="E8" type="text" placeholder="Resolusi" class="form-control col">
                        <div class="col-2 text-left pt-2">L/min
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col">
                    {{-- Kondisi Ruangan --}}
                    <label><b>Kondisi Ruangan</b></label>
                    <div class="row mx-0">
                      <input name="E17" type="text" placeholder="Suhu Awal" class="form-control col">
                      <input name="F17" type="text" placeholder="Suhu Akhir" class="form-control col ml-3">
                    </div>
                    <div class="row mx-0 mt-2">
                      <input name="E18" type="text" placeholder="Kelembapan Awal" class="form-control col">
                      <input name="F18" type="text" placeholder="Kelembapan Akhir" class="form-control col ml-3">
                    </div>
                  </div>
                </div>
  
                <div class="row mt-3">
                  <div class="form-group col-3">
                    <label><b>Tanggal Penerimaan Alat</b></label>
                    <input name="E9" type="date" class="form-control" value="{{ date('Y-m-d', time()) }}">
                  </div>
                  <div class="form-group col-3">
                    <label><b>Tanggal Kalibrasi</b></label>
                    <input name="E10" type="date" class="form-control" value="{{ date('Y-m-d', time()) }}">
                  </div>
                  <div class="form-group col-3">
                    <label><b>Tempat Kalibrasi</b></label>
                    <input name="E11" type="text" class="form-control" value="{{ $alkesOrder->external_order->user->fasyenkes_name }}">
                  </div>
                  <div class="form-group col-3">
                    <label><b>Nama Ruang</b></label>
                    <input name="E12" type="text" class="form-control">
                  </div>
                </div>
  
                <div class="row mt-3">
                  <div class="col-2 mx-0 form-group">
                    <label><b>Kondisi Alat</b></label>
                    <div class="custom-control custom-radio">
                      <input name="E21" value="Baik" type="radio" id="E21-a" class="custom-control-input">
                      <label class="custom-control-label" for="E21-a">Baik</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="E21" value="Tidak Baik" type="radio" id="E21-b" class="custom-control-input">
                      <label class="custom-control-label" for="E21-b">Tidak Baik</label>
                    </div>
                  </div>
                  <div class="col-2 mx-0 form-group">
                    <label><b>Fungsi Alat</b></label>
                    <div class="custom-control custom-radio">
                      <input name="E22" value="Baik" type="radio" id="E22-a" class="custom-control-input">
                      <label class="custom-control-label" for="E22-a">Baik</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="E22" value="Tidak Baik" type="radio" id="E22-b" class="custom-control-input">
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
                            <input name="{{ $letter.($i + 26) }}" type="text" class="form-control text-center align-middle">
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
                  <label><b>Keterangan</b></label>
                  <select name="B38" class="form-control">
                    <option value="Pembacaan skala diatas bola">
                      Pembacaan skala diatas bola
                    </option>
                    <option value="Pembacaan skala ditengah bola">
                      Pilih Alat Ukur
                    </option>
                    <option value="Pembacaan skala dibawah bola">
                      Pilih Alat Ukur
                    </option>
                  </select>
                </div>

                <div class="form-group mt-3 mb-0 row">
                  @foreach ($measuringInstruments as $index => $group)
                      <div class="form-group col">
                        <label>{{ 'Alat Ukur '. $group['name'] }}</label>
                        <select name="{{ 'B'.(41 + $index) }}" class="form-control">
                          <option disabled selected hidden>Pilih Alat Ukur</option>
                          @foreach ($group['instruments'] as $instrument)
                            <option value="{{$instrument}}">{{$instrument}}</option>
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