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
                      <input name="C4" type="text" placeholder="Merek" class="form-control">
                      <input name="C5" type="text" placeholder="Tipe/Model" class="form-control mt-2">
                      <input name="C6" type="text" placeholder="Nomor Seri" class="form-control mt-2">
                      <div class="row mt-2 mx-0">
                        <input name="C7" type="text" placeholder="Resolusi" class="form-control col">
                        <div class="col-2 text-left pt-2">mmHg
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col">
                    {{-- Kondisi Ruangan --}}
                    <label><b>Kondisi Ruangan</b></label>
                    <div class="row mx-0">
                      <input name="B24" type="text" placeholder="Suhu Awal" class="form-control col">
                      <input name="C24" type="text" placeholder="Suhu Akhir" class="form-control col ml-3">
                    </div>
                    <div class="row mx-0 mt-2">
                      <input name="B25" type="text" placeholder="Kelembapan Awal" class="form-control col">
                      <input name="C25" type="text" placeholder="Kelembapan Akhir" class="form-control col ml-3">
                    </div>
                    <input name="B26" type="text" placeholder="Tegangan Jala-jala" class="form-control mt-2">
                    <input name="B27" type="text" placeholder="Tekanan Udara" class="form-control mt-2">
                  </div>
                </div>
  
                <div class="row mt-3">
                  <div class="form-group col-3">
                    <label><b>Tanggal Penerimaan Alat</b></label>
                    <input name="C8" type="date" class="form-control" value="{{ date('Y-m-d', time()) }}">
                  </div>
                  <div class="form-group col-3">
                    <label><b>Tanggal Kalibrasi</b></label>
                    <input name="C9" type="date" class="form-control" value="{{ date('Y-m-d', time()) }}">
                  </div>
                  <div class="form-group col-3">
                    <label><b>Tempat Kalibrasi</b></label>
                    <input name="C10" type="text" class="form-control" value="{{ $alkesOrder->external_order->user->fasyenkes_name }}">
                  </div>
                  <div class="form-group col-3">
                    <label><b>Nama Ruang</b></label>
                    <input name="C11" type="text" class="form-control">
                  </div>
                </div>
  
                <div class="row mt-3">
                  <div class="col-2 mx-0 form-group">
                    <label><b>Kondisi Fisik Alat</b></label>
                    <div class="custom-control custom-radio">
                      <input name="C30" value="Baik" type="radio" id="C30-a" class="custom-control-input">
                      <label class="custom-control-label" for="C30-a">Baik</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="C30" value="Tidak Baik" type="radio" id="C30-b" class="custom-control-input">
                      <label class="custom-control-label" for="C30-b">Tidak Baik</label>
                    </div>
                  </div>
                  <div class="col-2 mx-0 form-group">
                    <label><b>Kondisi Fungsi Alat</b></label>
                    <div class="custom-control custom-radio">
                      <input name="C31" value="Baik" type="radio" id="C31-a" class="custom-control-input">
                      <label class="custom-control-label" for="C31-a">Baik</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="C31" value="Tidak Baik" type="radio" id="C31-b" class="custom-control-input">
                      <label class="custom-control-label" for="C31-b">Tidak Baik</label>
                    </div>
                  </div>
                  <div class="col">
                    <label><b>Klasifikasi Suction Pump</b></label>
                    <div class="custom-control custom-radio">
                      <input name="C12" value="(Surgical, Tracheal, Uterine)" type="radio" id="C12-a" class="custom-control-input">
                      <label class="custom-control-label" for="C12-a">Surgical, Tracheal, Uterine</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="C12" value="(Thoracic, low volume)" type="radio" id="C12-b" class="custom-control-input">
                      <label class="custom-control-label" for="C12-b">Thoracic, low volume</label>
                    </div>
                  </div>
                </div>
  
                <div class="form-group mt-3">
                  <label><b>Pengujian Kinerja</b></label>
                  <table class="table table-bordered table-md">
                    <tr>
                      <th class="text-center align-middle">No</th>
                      <th class="text-center align-middle">Parameter</th>
                      <th class="text-center align-middle">Hasil Ukur</th>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">1</td>
                      <td class="align-middle">Resistansi Isolasi</td>
                      <td>
                        <input name="G35" type="text" class="form-control">
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">2</td>
                      <td class="align-middle">
                        <select name="A36" class="form-control">
                          <option value="Resistansi Pembumian Protektif (kabel dapat dilepas)">
                            Resistansi Pembumian Protektif (kabel dapat dilepas)
                          </option>
                          <option value="Resistansi Pembumian Protektif (kabel tidak dapat dilepas)">
                            Resistansi Pembumian Protektif (kabel tidak dapat dilepas)
                          </option>
                        </select>
                      </td>
                      <td>
                        <input name="G36" type="text" class="form-control">
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">3</td>
                      <td class="align-middle">
                        <select name="A37" class="form-control">
                          <option value="Arus bocor peralatan untuk perangkat elektromedik kelas I">
                            Arus bocor peralatan untuk perangkat elektromedik kelas I
                          </option>
                          <option value="Arus bocor peralatan untuk perangkat elektromedik kelas II">
                            Arus bocor peralatan untuk perangkat elektromedik kelas II
                          </option>
                        </select>
                      </td>
                      <td>
                        <input name="G37" type="text" class="form-control">
                      </td>
                    </tr>
                  </table>
                </div>
  
                <div class="form-group mt-3">
                  <label><b>Pengukuran Akurasi Vacuum Gauge</b></label>
                  <div class="row">
                    <div class="col">
                      <label>Konversi Sertifikat</label>
                      <select name="D59" class="form-control">
                        <option value="mmHg ke mmHg">
                          mmHg ke mmHg
                        </option>
                        <option value="mmHg ke cmHg">
                          mmHg ke cmHg
                        </option>
                        <option value="mmHg ke kPa">
                          mmHg ke kPa
                        </option>
                        <option value="mmHg ke Mpa">
                          mmHg ke Mpa
                        </option>
                        <option value="mmHg ke mBar">
                          mmHg ke mBar
                        </option>
                        <option value="mmHg ke Bar">
                          mmHg ke Bar
                        </option>
                        <option value="mmHg ke Psi">
                          mmHg ke Psi
                        </option>
                        <option value="mmhg ke cmH20">
                          mmhg ke cmH20
                        </option>
                        <option value="kPa ke kPa">
                          kPa ke kPa
                        </option>
                        <option value="kPa ke Mpa">
                          kPa ke Mpa
                        </option>
                        <option value="mBar ke mBar">
                          mBar ke mBar
                        </option>
                        <option value="mBar ke Bar">
                          mBar ke Bar
                        </option>
                        <option value="Psi ke Psi">
                          Psi ke Psi
                        </option>
                        <option value="cmH20 ke cmH20">
                          cmH20 ke cmH20
                        </option>
                      </select>
                    </div>
                    <div class="col">
                      <label>Konversi Sertifikat</label>
                      <select name="F59" class="form-control">
                        <option value="mmHg ke mmHg">
                          mmHg ke mmHg
                        </option>
                        <option value="mmHg ke cmHg">
                          mmHg ke cmHg
                        </option>
                        <option value="mmHg ke kPa">
                          mmHg ke kPa
                        </option>
                        <option value="mmHg ke Mpa">
                          mmHg ke Mpa
                        </option>
                        <option value="mmHg ke mBar">
                          mmHg ke mBar
                        </option>
                        <option value="mmHg ke Bar">
                          mmHg ke Bar
                        </option>
                        <option value="mmHg ke Psi">
                          mmHg ke Psi
                        </option>
                        <option value="mmhg ke cmH20">
                          mmhg ke cmH20
                        </option>
                      </select>
                    </div>
                    <div class="col">
                      <label>Konversi DBAL</label>
                      <select name="H59" class="form-control">
                        <option value="mmHg ke mmHg">
                          mmHg ke mmHg
                        </option>
                        <option value="mmHg ke cmHg">
                          mmHg ke cmHg
                        </option>
                        <option value="mmHg ke kPa">
                          mmHg ke kPa
                        </option>
                        <option value="mmHg ke Mpa">
                          mmHg ke Mpa
                        </option>
                        <option value="mmHg ke mBar">
                          mmHg ke mBar
                        </option>
                        <option value="mmHg ke Bar">
                          mmHg ke Bar
                        </option>
                        <option value="mmHg ke Psi">
                          mmHg ke Psi
                        </option>
                        <option value="mmhg ke cmH20">
                          mmhg ke cmH20
                        </option>
                      </select>
                    </div>
                  </div>

                  <table class="table table-bordered table-md mt-4">
                    <tr>
                      <th class="text-center align-middle" rowspan="2">Pembacaan Alat</th>
                      <th class="text-center align-middle" colspan="6">Pembacaan Standar</th>
                    </tr>
                    <tr>
                      <th class="text-center align-middle">I</th>
                      <th class="text-center align-middle">II</th>
                      <th class="text-center align-middle">III</th>
                      <th class="text-center align-middle">IV</th>
                      <th class="text-center align-middle">V</th>
                      <th class="text-center align-middle">VI</th>
                    </tr>
                    @for ($i = 61; $i <= 65; $i++)
                      <tr>
                        @foreach (['A', 'B','C','D','E','F','G'] as $letter)
                          <td class="text-center align-middle">
                            <input name="{{ $letter.$i }}" type="text" class="form-control text-center align-middle">
                          </td>
                        @endforeach
                      </tr>
                      @endfor
                  </table>
                </div>

                <div class="form-group mt-3">
                  <label><b>Pengukuran Akurasi Vacuum Gauge</b></label>
                  <div class="row">
                    <div class="col">
                      <label>Hasil Ukur Tekanan Hisap Maksimum (mmHg)</label>
                      <input name="B79" type="text" class="form-control">
                    </div>
                    <div class="col">
                      <label>Konversi Satuan</label>
                      <select name="K78" class="form-control">
                        <option value="mmHg ke mmHg">
                          mmHg ke mmHg
                        </option>
                        <option value="CmHg ke MmHg">
                          CmHg ke MmHg
                        </option>
                        <option value="kPa ke mmHg">
                          kPa ke mmHg
                        </option>
                        <option value="Mpa ke mmHg">
                          Mpa ke mmHg
                        </option>
                        <option value="mBar ke mmHg">
                          mBar ke mmHg
                        </option>
                        <option value="Bar ke mmHg">
                          Bar ke mmHg
                        </option>
                        <option value="Psi ke mmHg">
                          Psi ke mmHg
                        </option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="form-group mt-3">
                  <label><b>Keterangan</b></label>
                  <select name="A87" class="form-control">
                    <option value="Catu daya menggunakan baterai">
                      Catu daya menggunakan baterai
                    </option>
                    <option value="">
                      Catu daya tidak menggunakan baterai
                    </option>
                  </select>
                </div>

                <div class="form-group mt-3 mb-0 row">
                  @foreach ($measuringInstruments as $index => $group)
                      <div class="form-group col">
                        <label><b>{{ 'Alat Ukur '. $group['name'] }}</b></label>
                        <select name="{{ 'E'.(8 + $index) }}" class="form-control">
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