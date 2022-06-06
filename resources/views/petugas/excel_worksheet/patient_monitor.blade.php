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
                    <input type="month" class="form-control" value="{{  date('Y-m', strtotime($certificate_month ??  time())) }}" name="certificate_date">
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
                      <input name="F4" type="text" placeholder="Merek" class="form-control" value="{{ $excel_value['F4'] ?? '' }}">
                    </div>
                    <div class="form-group col">
                      <label><b>Tipe/Model Alat</b></label>
                      <input name="F5" type="text" placeholder="Tipe/Model" class="form-control" value="{{ $excel_value['F5'] ?? '' }}">
                    </div>
                    <div class="form-group col">
                      <label><b>Nomor Seri</b></label>
                      <input name="F6" type="text" placeholder="Nomor Seri" class="form-control" value="{{ $excel_value['F6'] ?? '' }}">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-3">
                      <label><b>Tanggal Penerimaan Alat</b></label>
                      <input name="F7" type="date" class="form-control" value="{{ $excel_value['F7'] ?? date('Y-m-d', time()) }}">
                    </div>
                    <div class="form-group col-3">
                      <label><b>Tanggal Kalibrasi</b></label>
                      <input name="F8" type="date" class="form-control" value="{{ $excel_value['F8'] ?? date('Y-m-d', time()) }}">
                    </div>
                    <div class="form-group col-3">
                      <label><b>Tempat Kalibrasi</b></label>
                      <input name="F9" type="text" class="form-control" value="{{ $excel_value['F9'] ?? $alkesOrder->external_order->user->fasyenkes_name }}">
                    </div>
                    <div class="form-group col-3">
                      <label><b>Nama Ruang</b></label>
                      <input name="F10" type="text" class="form-control" value="{{ $excel_value['F10'] ?? '' }}">
                    </div>
                  </div>
                </div>

                <div class="mt-3 row">
                  <div class="form-group col">
                    <label><b>Suhu Awal</b></label>
                    <input name="F14" type="text" class="form-control" value="{{ $excel_value['F14'] ?? '' }}">
                  </div>
                  <div class="form-group col">
                    <label><b>Suhu Akhir</b></label>
                    <input name="G14" type="text" class="form-control" value="{{ $excel_value['G14'] ?? '' }}">
                  </div>
                  <div class="form-group col">
                    <label><b>Kelembapan Awal</b></label>
                    <input name="F15" type="text" class="form-control" value="{{ $excel_value['F15'] ?? '' }}">
                  </div>
                  <div class="form-group col">
                    <label><b>Kelembapan Akhir</b></label>
                    <input name="G15" type="text" class="form-control" value="{{ $excel_value['G15'] ?? '' }}">
                  </div>
                  <div class="form-group col">
                    <label><b>Tegangan Jala-jala</b></label>
                    <input name="F16" type="text" class="form-control" value="{{ $excel_value['F16'] ?? '' }}">
                  </div>
                </div>
  
                <div class="row mt-3">
                  <div class="col-2 mx-0 form-group">
                    <label><b>Kondisi Alat</b></label>
                    <div class="custom-control custom-radio">
                      <input name="F19" value="Baik" type="radio" id="F19-a" class="custom-control-input"
                        @if (isset($excel_value))
                          @if($excel_value['F19'] == "Baik") checked @endif
                        @endif>
                      <label class="custom-control-label" for="F19-a">Baik</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="F19" value="Tidak Baik" type="radio" id="F19-b" class="custom-control-input"
                        @if (isset($excel_value))
                          @if($excel_value['F19'] == "Tidak Baik") checked @endif
                        @endif>
                      <label class="custom-control-label" for="F19-b">Tidak Baik</label>
                    </div>
                  </div>
                  <div class="col-2 mx-0 form-group">
                    <label><b>Fungsi Alat</b></label>
                    <div class="custom-control custom-radio">
                      <input name="F20" value="Baik" type="radio" id="F20-a" class="custom-control-input"
                        @if (isset($excel_value))
                          @if($excel_value['F20'] == "Baik") checked @endif
                        @endif>
                      <label class="custom-control-label" for="F20-a">Baik</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input name="F20" value="Tidak Baik" type="radio" id="F20-b" class="custom-control-input"
                        @if (isset($excel_value))
                          @if($excel_value['F20'] == "Tidak Baik") checked @endif
                        @endif>
                      <label class="custom-control-label" for="F20-b">Tidak Baik</label>
                    </div>
                  </div>
                  <div class="col"></div>
                </div>
  
                <div class="form-group mt-3">
                  <label><b>Hasil Pengujian Keselamtan Listrik</b></label>
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
                        <input name="J25" type="text" class="form-control" value="{{ $excel_value['J25'] ?? '' }}">
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
                        <input name="J26" type="text" class="form-control" value="{{ $excel_value['J26'] ?? '' }}">
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
                        <input name="J27" type="text" class="form-control" value="{{ $excel_value['J27'] }}">
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">4</td>
                      <td class="align-middle">Arus bocor peralatan yang diaplikasikan</td>
                      <td class="text-center align-middle">
                        <input name="J28" type="text" class="form-control" value="{{ $excel_value['J28'] }}">
                      </td>
                    </tr>
                  </table>
                </div>
  
                <div class="form-group mt-3">
                  <label><b>Kalibrasi Heart Rate</b></label>
                  <table class="table table-bordered table-md">
                    <tr>
                      <th class="text-center align-middle" rowspan="2">No.</th>
                      <th class="text-center align-middle" rowspan="2">Parameter</th>
                      <th class="text-center align-middle" rowspan="2">Setting Standar</th>
                      <th class="text-center align-middle" colspan="6">Pembacaan Alat</th>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">I</td>
                      <td class="text-center align-middle">II</td>
                      <td class="text-center align-middle">III</td>
                      <td class="text-center align-middle">IV</td>
                      <td class="text-center align-middle">V</td>
                      <td class="text-center align-middle">VI</td>
                    </tr>
                    @foreach ([30, 60, 120, 180] as $index => $value)
                      <tr>
                        @if ($index == 0)
                          <td rowspan="4" class="text-center align-middle">1</td>
                          <td rowspan="4" class="text-center align-middle">
                            <select name="C35" class="form-control">
                              <option value="Heart Rate (BPM)"
                                @if (isset($excel_value))
                                  @if($excel_value['C35'] == "Heart Rate (BPM)") selected @endif
                                @endif>
                                Heart Rate (BPM)
                              </option>
                              <option value="Pulse Rate (BPM)"
                                @if (isset($excel_value))
                                  @if($excel_value['C35'] == "Pulse Rate (BPM)") selected @endif
                                @endif>
                                Pulse Rate (BPM)
                              </option>
                            </select>
                          </td>
                        @endif
                        <td class="text-center align-middle">{{ $value }}</td>
                        @foreach (['E','F','G','H','I','J'] as $letter)
                          <td class="text-center align-middle">
                            <input name="{{ $letter.($index + 35) }}" type="text" class="form-control" value="{{ $excel_value[$letter.($index + 35)] ?? '' }}">
                          </td>
                        @endforeach
                      </tr>
                    @endforeach
                  </table>
                </div>

                <div class="form-group mt-3">
                  <label><b>Kalibrasi Pulse Oximetri</b></label>
                  <table class="table table-bordered table-md">
                    <tr>
                      <th class="text-center align-middle" rowspan="2">No.</th>
                      <th class="text-center align-middle" rowspan="2">Parameter</th>
                      <th class="text-center align-middle" rowspan="2">Setting Standar</th>
                      <th class="text-center align-middle" colspan="6">Pembacaan Alat</th>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">I</td>
                      <td class="text-center align-middle">II</td>
                      <td class="text-center align-middle">III</td>
                      <td class="text-center align-middle">IV</td>
                      <td class="text-center align-middle">V</td>
                      <td class="text-center align-middle">VI</td>
                    </tr>
                    @foreach ([90, 95, 98, 99, 100] as $index => $value)
                      <tr>
                        @if ($index == 0)
                          <td rowspan="5" class="text-center align-middle">1</td>
                          <td rowspan="5" class="text-center align-middle">
                            SPO2 (%)
                          </td>
                        @endif
                        <td class="text-center align-middle">{{ $value }}</td>
                        @foreach (['E','F','G','H','I','J'] as $letter)
                          <td class="text-center align-middle">
                            <input name="{{ $letter.($index + 44) }}" type="text" class="form-control" value="{{ $excel_value[$letter.($index + 44)] ?? '' }}">
                          </td>
                        @endforeach
                      </tr>
                    @endforeach
                  </table>
                </div>

                <div class="form-group mt-3">
                  <label><b>Kalibrasi NIBP (Non Invasive Blood Pressure)</b></label>
                  
                  <select name="D62" class="form-control mt-2">
                    <option value="Dewasa"
                      @if (isset($excel_value))
                        @if($excel_value['D62'] == "Dewasa") selected @endif
                      @endif>
                      Dewasa
                    </option>
                    <option value="Anak"
                      @if (isset($excel_value))
                        @if($excel_value['D62'] == "Anak") selected @endif
                      @endif>
                      Anak
                    </option>
                    <option value="Bayi"
                      @if (isset($excel_value))
                        @if($excel_value['D62'] == "Bayi") selected @endif
                      @endif>
                      Bayi
                    </option>
                  </select>

                  <table class="table table-bordered table-md mt-2">
                    <tr>
                      <th class="text-center align-middle" rowspan="2">No.</th>
                      <th class="text-center align-middle" rowspan="2">Parameter<br>(mmHg)</th>
                      <th class="text-center align-middle" colspan="6">Pembacaan Alat</th>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">I</td>
                      <td class="text-center align-middle">II</td>
                      <td class="text-center align-middle">III</td>
                    </tr>
                    <?php $position = 54; ?>
                    @for ($i = 1; $i <= 4; $i++)
                      @foreach (['Sistole', 'Diastole'] as $param)
                        <tr>
                          @if ($param == "Sistole")
                            <td class="text-center align-middle" rowspan="2">{{ $i }}</td>
                          @endif
                          <td class="align-middle">{{ $param }}</td>
                          @foreach (['E', 'F', 'G'] as $letter)
                            <td class="text-center align-middle">
                              <input name="{{ $letter.$position }}" type="text" class="form-control" value="{{ $excel_value[$letter.$position] ?? '' }}">
                            </td>
                          @endforeach
                        </tr>
                        <?php $position++; ?>
                      @endforeach
                    @endfor
                  </table>
                </div>

                <div class="form-group mt-3">
                  <label><b>Kalibrasi Respirasi</b></label>
                  <table class="table table-bordered table-md">
                    <tr>
                      <th class="text-center align-middle" rowspan="2">No.</th>
                      <th class="text-center align-middle" rowspan="2">Parameter</th>
                      <th class="text-center align-middle" rowspan="2">Setting Standar</th>
                      <th class="text-center align-middle" colspan="6">Pembacaan Alat</th>
                    </tr>
                    <tr>
                      <td class="text-center align-middle">I</td>
                      <td class="text-center align-middle">II</td>
                      <td class="text-center align-middle">III</td>
                      <td class="text-center align-middle">IV</td>
                      <td class="text-center align-middle">V</td>
                      <td class="text-center align-middle">VI</td>
                    </tr>
                    @foreach ([20, 30, 40, 60] as $index => $value)
                      <tr>
                        @if ($index == 0)
                          <td rowspan="4" class="text-center align-middle">1</td>
                          <td rowspan="4" class="text-center align-middle">
                            Respirasi<br>(BrPM)
                          </td>
                        @endif
                        <td class="text-center align-middle">{{ $value }}</td>
                        @foreach (['E','F','G','H','I','J'] as $letter)
                          <td class="text-center align-middle">
                            <input name="{{ $letter.($index + 70) }}" type="text" class="form-control" value="{{ $excel_value[$letter.($index + 70)] ?? '' }}">
                          </td>
                        @endforeach
                      </tr>
                    @endforeach
                  </table>
                </div>

                <div class="form-group mt-3 mb-0 row">
                  <?php $rowPosition = [89, 91, 93, 95, 97]; ?>
                  @foreach ($measuringInstruments as $index => $group)
                      <div class="form-group col">
                        <label>{{ $group['name'] }}</label>
                        <select name="{{ 'B'.$rowPosition[$index] }}" class="form-control">
                          <option disabled selected hidden>Pilih Alat Ukur</option>
                          @foreach ($group['instruments'] as $instrument)
                            <option value="{{$instrument}}"
                              @if (isset($excel_value))
                                @if($excel_value['B'.$rowPosition[$index]] == $instrument) selected @endif
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