@extends($order_type == 'insitu' ? 'templates.insitu_page_layout' : 'templates.internal_page_layout')

@section('sub-content')
  <div class="card">
    <div class="card-header">
      <h4>Form Lembar Kerja</h4>
    </div>

    {{-- Informasi Sertifikat --}}
    <form action="
      @if (isset(explode('/', Route::getFacadeRoot()->current()->uri())[6]))
        {{ route('petugas.order.'. $order_type .'.worksheet.excel.update', ['order_id' => $order_id, 'alkes_order_id' => $alkesOrder->id]) }}
      @else
        {{ route('petugas.order.'. $order_type .'.worksheet.excel.store', ['order_id' => $order_id, 'alkes_order_id' => $alkesOrder->id]) }}
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
            <input type="text" class="form-control" value="{{ $alkesOrder->external_order->number ?? $alkesOrder->internal_order->number }}" name="order_number" readonly>
          </div>
        </div>

        <div class="mt-3">
          <div class="row">
            <div class="form-group col-3">
              <label><b>Merek Alat</b></label>
              <input name="E4" type="text" placeholder="Merek" class="form-control" value="{{ $excel_value['E4'] ?? $alkesOrder->merk ?? '' }}">
            </div>
            <div class="form-group col-3">
              <label><b>Tipe/Model Alat</b></label>
              <input name="E5" type="text" placeholder="Tipe/Model" class="form-control" value="{{ $excel_value['E5'] ?? $alkesOrder->model ?? '' }}">
            </div>
            <div class="form-group col-3">
              <label><b>Nomor Seri Alat</b></label>
              <input name="E6" type="text" placeholder="Tipe/Model" class="form-control" value="{{ $excel_value['E6'] ?? $alkesOrder->series_number ?? '' }}">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-3">
              <label><b>Tanggal Penerimaan Alat</b></label>
              <input name="E7" type="date" class="form-control" value="{{ $excel_value['E7'] ?? date('Y-m-d', time()) }}">
            </div>
            <div class="form-group col-3">
              <label><b>Tanggal Kalibrasi</b></label>
              <input name="E8" type="date" class="form-control" value="{{ $excel_value['E8'] ?? date('Y-m-d', time()) }}">
            </div>
            <div class="form-group col-3">
              <label><b>Tempat Kalibrasi</b></label>
              <input name="E9" type="text" class="form-control" value="{{ $excel_value['E9'] ?? $alkesOrder->external_order->user->fasyankes_name ?? 'Lab LPFK Banjarbaru' }}">
            </div>
            <div class="form-group col-3">
              <label><b>Nama Ruang</b></label>
              <input name="E10" type="text" class="form-control" value="{{ $excel_value['E10'] ?? '' }}">
            </div>
          </div>
        </div>

        <div class="row mt-3">
          <div class="form-group col">
            <label><b>Suhu Awal</b></label>
            <input name="E15" type="text" placeholder="Suhu Awal" class="form-control col" value="{{ $excel_value['E15'] ?? '' }}">
          </div>
          <div class="form-group col">
            <label><b>Suhu Akhir</b></label>
            <input name="F15" type="text" placeholder="Suhu Akhir" class="form-control col" value="{{ $excel_value['F15'] ?? '' }}">
          </div>
          <div class="form-group col">
            <label><b>Kelembapan Awal</b></label>
            <input name="E16" type="text" placeholder="Kelembapan Awal" class="form-control col" value="{{ $excel_value['E16'] ?? '' }}">
          </div>
          <div class="form-group col">
            <label><b>Kelembapan Akhir</b></label>
            <input name="F16" type="text" placeholder="Kelembapan Akhir" class="form-control col" value="{{ $excel_value['F16'] ?? '' }}">
          </div>
          <div class="form-group col">
            <label><b>tegangan Jala-jala</b></label>
            <input name="E17" type="text" placeholder="tegangan Jala-jala" class="form-control col" value="{{ $excel_value['E17'] ?? '' }}">
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-2 mx-0 form-group">
            <label><b>Kondisi Alat</b></label>
            <div class="custom-control custom-radio">
              <input name="E20" value="Baik" type="radio" id="E20-a" class="custom-control-input"
                @if (isset($excel_value))
                  @if($excel_value['E20'] == "Baik") checked @endif
                @endif>
              <label class="custom-control-label" for="E20-a">Baik</label>
            </div>
            <div class="custom-control custom-radio">
              <input name="E20" value="Tidak Baik" type="radio" id="E20-b" class="custom-control-input"
                @if (isset($excel_value))
                  @if($excel_value['E20'] == "Tidak Baik") checked @endif
                @endif>
              <label class="custom-control-label" for="E20-b">Tidak Baik</label>
            </div>
          </div>
          <div class="col-2 mx-0 form-group">
            <label><b>Fungsi Alat</b></label>
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
          <div class="col"></div>
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
                <input name="H25" type="text" class="form-control" value="{{ $excel_value['H25'] ?? '' }}">
              </td>
            </tr>
            <tr>
              <td class="text-center align-middle">2</td>
              <td class="align-middle">
                <select name="C26" class="form-control">
                  <option value="Resistansi Pembumian Protektif (kabel dapat dilepas)"
                    @if (isset($excel_value))
                      @if($excel_value['C26'] == "Resistansi Pembumian Protektif (kabel dapat dilepas)") selected @endif
                    @endif>
                    Resistansi Pembumian Protektif (kabel dapat dilepas)
                  </option>
                  <option value="Resistansi Pembumian Protektif (kabel tidak dapat dilepas)"
                    @if (isset($excel_value))
                      @if($excel_value['C26'] == "Resistansi Pembumian Protektif (kabel tidak dapat dilepas)") selected @endif
                    @endif>
                    Resistansi Pembumian Protektif (kabel tidak dapat dilepas)
                  </option>
                </select>
              </td>
              <td>
                <input name="H26" type="text" class="form-control" value="{{ $excel_value['H26'] ?? '' }}">
              </td>
            </tr>
            <tr>
              <td class="text-center align-middle">3</td>
              <td class="align-middle">
                <select name="C27" class="form-control">
                  <option value="Arus bocor peralatan untuk perangkat elektromedik kelas I"
                    @if (isset($excel_value))
                      @if($excel_value['C27'] == "Arus bocor peralatan untuk perangkat elektromedik kelas I") selected @endif
                    @endif>
                    Arus bocor peralatan untuk perangkat elektromedik kelas I
                  </option>
                  <option value="Arus bocor peralatan untuk perangkat elektromedik kelas II"
                    @if (isset($excel_value))
                      @if($excel_value['C27'] == "Arus bocor peralatan untuk perangkat elektromedik kelas II") selected @endif
                    @endif>
                    Arus bocor peralatan untuk perangkat elektromedik kelas II
                  </option>
                </select>
              </td>
              <td>
                <input name="H27" type="text" class="form-control" value="{{ $excel_value['H27'] ?? '' }}">
              </td>
            </tr>
          </table>
        </div>

        <div class="form-group mt-3">
          <label><b>Keterangan</b></label>
          <table class="table table-bordered table-md">
            <thead>
              <tr>
                  <th rowspan="2" class="text-center align-middle">No</th>
                  <th rowspan="2" class="text-center align-middle">Parameter</th>
                  <th rowspan="2" class="text-center align-middle">Setting Alat</th>
                  <th colspan="6" class="text-center align-middle">Pembacaan Standar</th>
              </tr>
              <tr>
                  <th class="text-center align-middle">I</th>
                  <th class="text-center align-middle">II</th>
                  <th class="text-center align-middle">III</th>
                  <th class="text-center align-middle">IV</th>
                  <th class="text-center align-middle">V</th>
                  <th class="text-center align-middle">VI</th>
              </tr>
          </thead>
          <tbody>
              <?php 
                  $parameters = [
                      'Illumination (Klux)',
                      'Kecepatan Bor Gigi (RPM)',
                      'Tekanan Semprot udara (Psi)',
                      'Tekanan Hisap Saliva (mmHg)',
                      'Tekanan Hisap Blood (mmHg)'
                  ]; 

                  $col_number = 32;
              ?>
              @foreach ($parameters as $index => $parameter)
                  @if ($index == 1)
                      @foreach (['High Speed Maks', 'Low Speed Maks'] as $indexSetting => $setting)
                          <tr>
                              @if ($indexSetting == 0)
                                  <td rowspan="2">{{ $index+1 }}</td>
                                  <td rowspan="2">{{ $parameter }}</td>
                              @endif
                              <td>{{ $setting }}</td>
                              @foreach (range('E', 'J') as $letter)
                                  <td>
                                    <input type="text" class="form-control text-center" name="{{ $letter.$col_number }}" value="{{ $excel_value[$letter.$col_number] ?? ''}}">
                                  </td>
                              @endforeach
                          </tr>
                          <?php $col_number++; ?>
                      @endforeach
                  @else
                      <tr>
                          <td>{{ $index+1 }}</td>
                          <td>{{ $parameter }}</td>
                          <td>Maks</td>
                          @foreach (range('E', 'J') as $letter)
                              <td>
                                <input type="text" class="form-control text-center" name="{{ $letter.$col_number }}" value="{{ $excel_value[$letter.$col_number] ?? '' }}">
                              </td>
                          @endforeach
                      </tr>
                      <?php $col_number++; ?>
                  @endif
              @endforeach
          </tbody>
          </table>
        </div>

        <div class="form-group mt-3 mb-0 row">
          @foreach ($measuringInstruments as $index => $group)
              <div class="form-group col">
                <label>{{ 'Alat Ukur '. $group['name'] }}</label>
                <select name="{{ 'B'.(51 + $index) }}" class="form-control">
                  <option disabled selected hidden>Pilih Alat Ukur</option>
                  @foreach ($group['instruments'] as $instrument)
                    <option value="{{$instrument}}"
                      @if (isset($excel_value))
                        @if($excel_value['B'.(51 + $index)] == $instrument) selected @endif
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
          <select name="B62" class="form-control">
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
@endsection