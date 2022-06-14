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
            <form action="
              @if (isset(explode('/', Route::getFacadeRoot()->current()->uri())[6]))
                {{ route('petugas.order.external.worksheet.excel.update', ['order_id' => $order_id, 'alkes_order_id' => $alkesOrder->id]) }}
              @else
                {{ route('petugas.order.external.worksheet.excel.store', ['order_id' => $order_id, 'alkes_order_id' => $alkesOrder->id]) }}
              @endif" 
              method="post">
              
              @csrf
              @if (isset(explode('/', Route::getFacadeRoot()->current()->uri())[6]))
                @method('PUT')
              @endif" 

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
                      <input name="C4" type="text" placeholder="Merek" class="form-control" value="{{ $excel_value['C4'] ?? '' }}">
                    </div>
                    <div class="form-group col">
                      <label><b>Tipe/Model Alat</b></label>
                      <input name="C5" type="text" placeholder="Tipe/Model" class="form-control" value="{{ $excel_value['C5'] ?? '' }}">
                    </div>
                    <div class="form-group col">
                      <label><b>Nomor Seri</b></label>
                      <input name="C6" type="text" placeholder="Nomor Seri" class="form-control" value="{{ $excel_value['C6'] ?? '' }}">
                    </div>
                    <div class="form-group col">
                      <label><b>Resolusi</b></label>
                      <div class="row mx-0">
                        <input name="C7" type="text" placeholder="Resolusi" class="form-control col" value="{{ $excel_value['C7'] ?? '' }}">
                        <div class="col-4 text-center pt-2">mmHg
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-3">
                      <label><b>Tanggal Penerimaan Alat</b></label>
                      <input name="C8" type="date" class="form-control" value="{{ $excel_value['C8'] ?? date('Y-m-d', time()) }}">
                    </div>
                    <div class="form-group col-3">
                      <label><b>Tanggal Kalibrasi</b></label>
                      <input name="C9" type="date" class="form-control" value="{{ $excel_value['C9'] ?? date('Y-m-d', time()) }}">
                    </div>
                    <div class="form-group col-3">
                      <label><b>Tempat Kalibrasi</b></label>
                      <input name="C10" type="text" class="form-control" value="{{ $excel_value['C10'] ?? $alkesOrder->external_order->user->fasyankes_name }}">
                    </div>
                    <div class="form-group col-3">
                      <label><b>Nama Ruang</b></label>
                      <input name="C11" type="text" class="form-control" value="{{ $excel_value['C11'] ?? '' }}">
                    </div>
                  </div>
                </div>

                <div class="row mt-3">
                  <div class="form-group col-3">
                    <label><b>Suhu Awal</b></label>
                    <input name="B24" type="text" placeholder="Suhu Awal" class="form-control col" value="{{ $excel_value['B24'] ?? '' }}">
                  </div>
                  <div class="form-group col-3">
                    <label><b>Suhu Akhir</b></label>
                    <input name="C24" type="text" placeholder="Suhu Akhir" class="form-control col" value="{{ $excel_value['C24'] ?? '' }}">
                  </div>
                  <div class="form-group col-3">
                    <label><b>Kelembapan Awal</b></label>
                    <input name="B25" type="text" placeholder="Kelembapan Awal" class="form-control col" value="{{ $excel_value['B25'] ?? '' }}">
                  </div>
                  <div class="form-group col-3">
                    <label><b>Kelembapan Akhir</b></label>
                    <input name="C26" type="text" placeholder="Kelembapan Akhir" class="form-control col" value="{{ $excel_value['C25'] ?? '' }}">
                  </div>
                  <div class="form-group col-3">
                    <label><b>Tegangan jala-jala</b></label>
                    <input name="B26" type="text" placeholder="Kelembapan Awal" class="form-control col" value="{{ $excel_value['B26'] ?? '' }}">
                  </div>
                  <div class="form-group col-3">
                    <label><b>Tekanan Udara</b></label>
                    <input name="B27" type="text" placeholder="Kelembapan Akhir" class="form-control col" value="{{ $excel_value['B27'] ?? '' }}">
                  </div>
                </div>
  
                <div class="row mt-3">
                  <div class="col-2 mx-0 form-group">
                    <label><b>Kondisi Fisik Alat</b></label>
                    <div class="custom-control custom-radio">
                      <input name="C30" value="Baik" type="radio" id="C30-a" class="custom-control-input"
                        @if (isset($excel_value))
                          @if($excel_value['C30'] == "Baik") checked @endif
                        @endif>
                      <label class="custom-control-label" for="C30-a">Baik</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="C30" value="Tidak Baik" type="radio" id="C30-b" class="custom-control-input"
                        @if (isset($excel_value))
                          @if($excel_value['C30'] == "Tidak Baik") checked @endif
                        @endif>
                      <label class="custom-control-label" for="C30-b">Tidak Baik</label>
                    </div>
                  </div>
                  <div class="col-2 mx-0 form-group">
                    <label><b>Kondisi Fungsi Alat</b></label>
                    <div class="custom-control custom-radio">
                      <input name="C31" value="Baik" type="radio" id="C31-a" class="custom-control-input"
                        @if (isset($excel_value))
                          @if($excel_value['C31'] == "Baik") checked @endif
                        @endif>
                      <label class="custom-control-label" for="C31-a">Baik</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="C31" value="Tidak Baik" type="radio" id="C31-b" class="custom-control-input"
                        @if (isset($excel_value))
                          @if($excel_value['C31'] == "Tidak Baik") checked @endif
                        @endif>
                      <label class="custom-control-label" for="C31-b">Tidak Baik</label>
                    </div>
                  </div>
                  <div class="col form-group">
                    <label><b>Klasifikasi Suction Pump</b></label>
                    <div class="custom-control custom-radio">
                      <input name="C12" value="(Surgical, Tracheal, Uterine)" type="radio" id="C12-a" class="custom-control-input"
                        @if (isset($excel_value))
                          @if($excel_value['C12'] == "(Surgical, Tracheal, Uterine)") checked @endif
                        @endif>
                      <label class="custom-control-label" for="C12-a">Surgical, Tracheal, Uterine</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="C12" value="(Thoracic, low volume)" type="radio" id="C12-b" class="custom-control-input"
                        @if (isset($excel_value))
                          @if($excel_value['C12'] == "(Thoracic, low volume)") checked @endif
                        @endif>
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
                        <input name="G35" type="text" class="form-control" value="{{ $excel_value['G35'] ?? '' }}">
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">2</td>
                      <td class="align-middle">
                        <select name="A36" class="form-control">
                          <option value="Resistansi pembumian protektif (kabel dapat dilepas) (Ω)"
                            @if (isset($excel_value))
                              @if($excel_value['A36'] == "Resistansi pembumian protektif (kabel dapat dilepas) (Ω)") selected @endif
                            @endif>
                            Resistansi Pembumian Protektif (kabel dapat dilepas)
                          </option>
                          <option value="Resistansi pembumian protektif (kabel tidak dapat dilepas) (Ω)"
                            @if (isset($excel_value))
                              @if($excel_value['A36'] == "Resistansi pembumian protektif (kabel tidak dapat dilepas) (Ω)") selected @endif
                            @endif>
                            Resistansi pembumian protektif (kabel tidak dapat dilepas) (Ω)
                          </option>
                        </select>
                      </td>
                      <td>
                        <input name="G36" type="text" class="form-control" value="{{ $excel_value['G36'] ?? '' }}">
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">3</td>
                      <td class="align-middle">
                        <select name="A37" class="form-control">
                          <option value="Arus bocor peralatan untuk peralatan elektromedik kelas I (µA)"
                            @if (isset($excel_value))
                              @if($excel_value['A37'] == "Arus bocor peralatan untuk peralatan elektromedik kelas I (µA)") selected @endif
                            @endif>
                            Arus bocor peralatan untuk peralatan elektromedik kelas I (µA)
                          </option>
                          <option value="Arus bocor peralatan untuk peralatan elektromedik kelas II (µA)"
                            @if (isset($excel_value))
                              @if($excel_value['A37'] == "Arus bocor peralatan untuk peralatan elektromedik kelas II (µA)") selected @endif
                            @endif>
                            Arus bocor peralatan untuk peralatan elektromedik kelas II (µA)
                          </option>
                        </select>
                      </td>
                      <td>
                        <input name="G37" type="text" class="form-control" value="{{ $excel_value['G37'] ?? '' }}">
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
                        <option value="mmHg ke mmHg"
                          @if (isset($excel_value))
                            @if($excel_value['D59'] == "mmHg ke mmHg") selected @endif
                          @endif>
                          mmHg ke mmHg
                        </option>
                        <option value="mmHg ke cmHg"
                          @if (isset($excel_value))
                            @if($excel_value['D59'] == "mmHg ke cmHg") selected @endif
                          @endif>
                          mmHg ke cmHg
                        </option>
                        <option value="mmHg ke kPa"
                          @if (isset($excel_value))
                            @if($excel_value['D59'] == "mmHg ke kPa") selected @endif
                          @endif>
                          mmHg ke kPa
                        </option>
                        <option value="mmHg ke Mpa"
                          @if (isset($excel_value))
                            @if($excel_value['D59'] == "mmHg ke Mpa") selected @endif
                          @endif>
                          mmHg ke Mpa
                        </option>
                        <option value="mmHg ke mBar"
                          @if (isset($excel_value))
                            @if($excel_value['D59'] == "mmHg ke mBar") selected @endif
                          @endif>
                          mmHg ke mBar
                        </option>
                        <option value="mmHg ke Bar"
                          @if (isset($excel_value))
                            @if($excel_value['D59'] == "mmHg ke Bar") selected @endif
                          @endif>
                          mmHg ke Bar
                        </option>
                        <option value="mmHg ke Psi"
                          @if (isset($excel_value))
                            @if($excel_value['D59'] == "mmHg ke Psi") selected @endif
                          @endif>
                          mmHg ke Psi
                        </option>
                        <option value="mmhg ke cmH20"
                          @if (isset($excel_value))
                            @if($excel_value['D59'] == "hg ke cmH20") selected @endif
                          @endif>
                          mmhg ke cmH20
                        </option>
                        <option value="kPa ke kPa"
                          @if (isset($excel_value))
                            @if($excel_value['D59'] == "kPa ke kPa") selected @endif
                          @endif>
                          kPa ke kPa
                        </option>
                        <option value="kPa ke Mpa"
                          @if (isset($excel_value))
                            @if($excel_value['D59'] == "kPa ke Mpa") selected @endif
                          @endif>
                          kPa ke Mpa
                        </option>
                        <option value="mBar ke mBar"
                          @if (isset($excel_value))
                            @if($excel_value['D59'] == "mBar ke mBar") selected @endif
                          @endif>
                          mBar ke mBar
                        </option>
                        <option value="mBar ke Bar"
                          @if (isset($excel_value))
                            @if($excel_value['D59'] == "mBar ke Bar") selected @endif
                          @endif>
                          mBar ke Bar
                        </option>
                        <option value="Psi ke Psi"
                          @if (isset($excel_value))
                            @if($excel_value['D59'] == "Psi ke Psi") selected @endif
                          @endif>
                          Psi ke Psi
                        </option>
                        <option value="cmH20 ke cmH20"
                          @if (isset($excel_value))
                            @if($excel_value['D59'] == "cmH20 ke cmH20") selected @endif
                          @endif>
                          cmH20 ke cmH20
                        </option>
                      </select>
                    </div>
                    <div class="col">
                      <label>Konversi Sertifikat</label>
                      <select name="F59" class="form-control">
                        <option value="mmHg ke mmHg"
                          @if (isset($excel_value))
                            @if($excel_value['F59'] == "mmHg ke mmHg") selected @endif
                          @endif>
                          mmHg ke mmHg
                        </option>
                        <option value="mmHg ke cmHg"
                          @if (isset($excel_value))
                            @if($excel_value['F59'] == "mmHg ke cmHg") selected @endif
                          @endif>
                          mmHg ke cmHg
                        </option>
                        <option value="mmHg ke kPa"
                          @if (isset($excel_value))
                            @if($excel_value['F59'] == "mmHg ke kPa") selected @endif
                          @endif>
                          mmHg ke kPa
                        </option>
                        <option value="mmHg ke Mpa"
                          @if (isset($excel_value))
                            @if($excel_value['F59'] == "mmHg ke Mpa") selected @endif
                          @endif>
                          mmHg ke Mpa
                        </option>
                        <option value="mmHg ke mBar"
                          @if (isset($excel_value))
                            @if($excel_value['F59'] == "mmHg ke mBar") selected @endif
                          @endif>
                          mmHg ke mBar
                        </option>
                        <option value="mmHg ke Bar"
                          @if (isset($excel_value))
                            @if($excel_value['F59'] == "mmHg ke Bar") selected @endif
                          @endif>
                          mmHg ke Bar
                        </option>
                        <option value="mmHg ke Psi"
                          @if (isset($excel_value))
                            @if($excel_value['F59'] == "mmHg ke Psi") selected @endif
                          @endif>
                          mmHg ke Psi
                        </option>
                        <option value="mmhg ke cmH20"
                          @if (isset($excel_value))
                            @if($excel_value['F59'] == "mmhg ke cmH20") selected @endif
                          @endif>
                          mmhg ke cmH20
                        </option>
                      </select>
                    </div>
                    <div class="col">
                      <label>Konversi DBAL</label>
                      <select name="H59" class="form-control">
                        <option value="mmHg ke mmHg"
                          @if (isset($excel_value))
                            @if($excel_value['H59'] == "mmHg ke mmHg") selected @endif
                          @endif>
                          mmHg ke mmHg
                        </option>
                        <option value="mmHg ke cmHg"
                          @if (isset($excel_value))
                            @if($excel_value['H59'] == "mmHg ke cmHg") selected @endif
                          @endif>
                          mmHg ke cmHg
                        </option>
                        <option value="mmHg ke kPa"
                          @if (isset($excel_value))
                            @if($excel_value['H59'] == "mmHg ke kPa") selected @endif
                          @endif>
                          mmHg ke kPa
                        </option>
                        <option value="mmHg ke Mpa"
                          @if (isset($excel_value))
                            @if($excel_value['H59'] == "mmHg ke Mpa") selected @endif
                          @endif>
                          mmHg ke Mpa
                        </option>
                        <option value="mmHg ke mBar"
                          @if (isset($excel_value))
                            @if($excel_value['H59'] == "mmHg ke mBar") selected @endif
                          @endif>
                          mmHg ke mBar
                        </option>
                        <option value="mmHg ke Bar"
                          @if (isset($excel_value))
                            @if($excel_value['H59'] == "mmHg ke Bar") selected @endif
                          @endif>
                          mmHg ke Bar
                        </option>
                        <option value="mmHg ke Psi"
                          @if (isset($excel_value))
                            @if($excel_value['H59'] == "mmHg ke Psi") selected @endif
                          @endif>
                          mmHg ke Psi
                        </option>
                        <option value="mmhg ke cmH20"
                          @if (isset($excel_value))
                            @if($excel_value['H59'] == "mmhg ke cmH20") selected @endif
                          @endif>
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
                            <input name="{{ $letter.$i }}" type="text" class="form-control text-center align-middle" value="{{ $excel_value[$letter.$i] ?? '' }}">
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
                      <input name="B79" type="text" class="form-control" value="{{ $excel_value['B79'] ?? '' }}">
                    </div>
                    <div class="col">
                      <label>Konversi Satuan</label>
                      <select name="K78" class="form-control">
                        <option value="mmHg ke mmHg"
                          @if (isset($excel_value))
                            @if($excel_value['K78'] == "mmHg ke mmHg") selected @endif
                          @endif>
                          mmHg ke mmHg
                        </option>
                        <option value="CmHg ke MmHg"
                          @if (isset($excel_value))
                            @if($excel_value['K78'] == "CmHg ke MmHg") selected @endif
                          @endif>
                          CmHg ke MmHg
                        </option>
                        <option value="kPa ke mmHg"
                          @if (isset($excel_value))
                            @if($excel_value['K78'] == "kPa ke mmHg") selected @endif
                          @endif>
                          kPa ke mmHg
                        </option>
                        <option value="Mpa ke mmHg"
                          @if (isset($excel_value))
                            @if($excel_value['K78'] == "Mpa ke mmHg") selected @endif
                          @endif>
                          Mpa ke mmHg
                        </option>
                        <option value="mBar ke mmHg"
                          @if (isset($excel_value))
                            @if($excel_value['K78'] == "mBar ke mmHg") selected @endif
                          @endif>
                          mBar ke mmHg
                        </option>
                        <option value="Bar ke mmHg"
                          @if (isset($excel_value))
                            @if($excel_value['K78'] == "Bar ke mmHg") selected @endif
                          @endif>
                          Bar ke mmHg
                        </option>
                        <option value="Psi ke mmHg"
                          @if (isset($excel_value))
                            @if($excel_value['K78'] == "Psi ke mmHg") selected @endif
                          @endif>
                          Psi ke mmHg
                        </option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="form-group mt-3">
                  <label><b>Keterangan</b></label>
                  <select name="A87" class="form-control">
                    <option value="Catu daya menggunakan baterai"
                      @if (isset($excel_value))
                        @if($excel_value['A87'] == "Catu daya menggunakan baterai") selected @endif
                      @endif>
                      Catu daya menggunakan baterai
                    </option>
                    <option value=""
                      @if (isset($excel_value))
                        @if($excel_value['A87'] == "") selected @endif
                      @endif>
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
                            <option value="{{ $instrument }}"
                              @if (isset($excel_value))
                                @if($excel_value['E'.(8 + $index)] == $instrument) selected @endif
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
                <button type="submit" class="btn btn-primary px-3">
                  <i class="fas fa-save mr-1"></i>
                  Simpan
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection