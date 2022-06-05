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
                      <input name="C6" type="text" placeholder="Merek" class="form-control">
                      <input name="C7" type="text" placeholder="Tipe/Model" class="form-control mt-2">
                      <input name="C8" type="text" placeholder="Nomor Seri" class="form-control mt-2">
                      <div class="row mt-2 mx-0">
                        <input name="C9" type="text" placeholder="Resolusi" class="form-control col">
                        <div class="col-2 text-center pt-2">mmHg</div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col">
                    <label><b>Kondisi Ruangan</b></label>
                    <div class="row mx-0">
                      <input name="B22" type="text" placeholder="Suhu Awal" class="form-control col">
                      <input name="C22" type="text" placeholder="Suhu Akhir" class="form-control col ml-3">
                    </div>
                    <div class="row mx-0 mt-2">
                      <input name="B23" type="text" placeholder="Kelembapan Awal" class="form-control col">
                      <input name="C23" type="text" placeholder="Kelembapan Akhir" class="form-control col ml-3">
                    </div>
                  </div>
                </div>
  
                <div class="row mt-3">
                  <div class="form-group col-3">
                    <label><b>Tanggal Penerimaan Alat</b></label>
                    <input name="C10" type="date" class="form-control" value="{{ date('Y-m-d', time()) }}">
                  </div>
                  <div class="form-group col-3">
                    <label><b>Tanggal Kalibrasi</b></label>
                    <input name="C11" type="date" class="form-control" value="{{ date('Y-m-d', time()) }}">
                  </div>
                  <div class="form-group col-3">
                    <label><b>Tempat Kalibrasi</b></label>
                    <input name="C12" type="text" class="form-control" value="{{ $alkesOrder->external_order->user->fasyenkes_name }}">
                  </div>
                  <div class="form-group col-3">
                    <label><b>Nama Ruang</b></label>
                    <input name="C13" type="text" class="form-control">
                  </div>
                </div>
  
                <div class="row mt-3">
                  <div class="col-2 mx-0 form-group">
                    <label><b>Kondisi Alat</b></label>
                    <div class="custom-control custom-radio">
                      <input name="C20" value="Baik" type="radio" id="C20-a" class="custom-control-input">
                      <label class="custom-control-label" for="C20-a">Baik</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="C20" value="Tidak Baik" type="radio" id="C20-b" class="custom-control-input">
                      <label class="custom-control-label" for="C20-b">Tidak Baik</label>
                    </div>
                  </div>
                  <div class="col-2 mx-0 form-group">
                    <label><b>Fungsi Alat</b></label>
                    <div class="custom-control custom-radio">
                      <input name="C21" value="Baik" type="radio" id="C21-a" class="custom-control-input">
                      <label class="custom-control-label" for="C21-a">Baik</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="C21" value="Tidak Baik" type="radio" id="C21-b" class="custom-control-input">
                      <label class="custom-control-label" for="C21-b">Tidak Baik</label>
                    </div>
                  </div>
                  <div class="col-3 mx-0 form-group">
                    <label><b>Klasifikasi Spygmomanometer</b></label>
                    <div class="custom-control custom-radio">
                      <input name="C14" value="Dewasa" type="radio" id="C14-a" class="custom-control-input">
                      <label class="custom-control-label" for="C14-a">Dewasa</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="C14" value="Anak" type="radio" id="C14-b" class="custom-control-input">
                      <label class="custom-control-label" for="C14-b">Anak</label>
                    </div>
                  </div>
                  <div class="col"></div>
                </div>
  
                <div class="mt-3 row">
                  <div class="col form-group">
                    <label><b>Pengujian Kebocoran Tekanan</b></label>
                    <div class="row align-middle">
                      <div class="col">
                        <div class="custom-control custom-radio">
                          <input name="B41" value="Laju Kebocoran tekanan 250 mmHg dalam 1 menit" type="radio" id="B41-a" class="custom-control-input">
                          <label class="custom-control-label" for="B41-a">
                            Tekanan 250 mmHg dalam 1 menit
                          </label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input name="B41" value="Laju Kebocoran tekanan 150 mmHg dalam 1 menit" type="radio" id="B41-b" class="custom-control-input">
                          <label class="custom-control-label" for="B41-b">
                            Tekanan 150 mmHg dalam 1 menit
                          </label>
                        </div>
                      </div>
                      <input name="B43" type="text" class="form-control col" placeholder="Nilai Laju Kebocoran">
                    </div>
                  </div>
                  <div class="col form-group">
                    <label><b>Laju Buang Cepat</b></label>
                    <div class="row align-middle">
                      <div class="col">
                        <div class="custom-control custom-radio">
                          <input name="B52" value="Laju Buang Cepat tekanan 260 mmHg sampai dengan 15 mmHg" type="radio" id="B52-a" class="custom-control-input">
                          <label class="custom-control-label" for="B52-a">
                            Tekanan 260 mmHg s/d 15 mmHg
                          </label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input name="B52" value="Laju Buang Cepat tekanan 150 mmHg sampai dengan 15 mmHg" type="radio" id="B52-b" class="custom-control-input">
                          <label class="custom-control-label" for="B52-b">
                            Tekanan 150 mmHg s/d 15 mmHg
                          </label>
                        </div>
                      </div>
                      <input name="B54" type="text" class="form-control col" placeholder="Nilai Laju Buang Cepat">
                    </div>
                  </div>
                </div>

                <div class="form-group mt-3">
                  <label><b>Kalibrasi Akurasi Tekanan</b></label>
                  <table class="table table-bordered table-md">
                    <tr>
                      <th rowspan="2" class="text-center align-middle">Parameter</th>
                      <th colspan="6" class="text-center align-middle">Pembacaan Standar</th>
                    </tr>
                    <tr>
                      @for ($i = 1; $i <= 3; $i++)
                        <th class="text-center align-middle">NAIK {{ $i }}</th>
                        <th class="text-center align-middle">TURUN {{ $i }}</th>
                      @endfor
                    </tr>
                    @foreach ([0, 50, 100, 150, 200, 250] as $index => $standar)
                      <tr>
                        <td class="text-center">{{ $standar }}</td>
                        @foreach (['B','C','D','E','F','G'] as $letter)
                          <td>
                            <input name="{{ $letter.($index + 68) }}" type="text" class="form-control text-center">
                          </td>
                        @endforeach
                      </tr>
                    @endforeach
                  </table>
                </div>

                <div class="form-group mt-3">
                  <label><b>Keterangan</b></label>
                  <?php 
                    $descriptions = [
                      'Manset harap diganti',
                      'Bulb harap diganti',
                      'Manset dan Bulb harap diganti',
                      'Manset harap dilengkapi',
                      'Bulb harap dilengkapi',
                      'Manset dan bulb harap dilengkapi',
                      'Titik ukur atas permintaan pelanggan',
                      '-',
                      ''
                    ];
                  ?>

                  <div class="row">
                    <div class="col">
                      <select name="A76" class="form-control">
                        <option value="" hidden selected>
                          keterangan 1
                        </option>
                        @foreach ($descriptions as $description)
                          <option value="{{ $description }}">
                            {{ $description }}
                          </option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col">
                      <select name="A77" class="form-control">
                        <option value="" hidden selected>
                          keterangan 2
                        </option>
                        @foreach ($descriptions as $description)
                          <option value="{{ $description }}">
                            {{ $description }}
                          </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>

                <div class="form-group mt-3">
                  <label><b>Keterangan</b></label>
                  <select name="B51" class="form-control">
                    <option value="Ketidakpastian pengukuran diperoleh dari sumber kesalahan tipe A dan tipe B">
                      Ketidakpastian pengukuran diperoleh dari sumber kesalahan tipe A dan tipe B
                    </option>
                    <option value="1. Ketidakpastian pengukuran diperoleh dari sumber ketidakpastian tipe A dan tipe B">
                      1. Ketidakpastian pengukuran diperoleh dari sumber ketidakpastian tipe A dan tipe B
                    </option>
                  </select>
                </div>

                <div class="form-group mt-3 mb-0 row">
                  @foreach ($measuringInstruments as $index => $group)
                      <div class="form-group col">
                        <label><b>{{ 'Alat Ukur '. $group['name'] }}</b></label>
                        <select name="{{ 'B'.($index + 83) }}" class="form-control">
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
                  <select name="B81" class="form-control">
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