@extends('templates.app')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Pengajuan Internal</h1>
    </div>

    <div class="section-body">
      <h2 class="section-title">Pengajuan Internal Pengujian dan Kalibrasi Alat Kesehatan</h2>
      <p class="section-lead">Melakukan pengujian dan kalibrasi di Loka Pengamanan Fasilitas Kesehatan (LPFK) Banjarbaru</p>

      <div class="row">
        <div class="col-12">
          @if (Session::has('success'))
              <div class="alert alert-success mb-2">{{ Session::get('success') }}</div>
          @elseif(Session::has('error'))
              <div class="alert alert-danger mb-2">{{ Session::get('error') }}</div>
          @endif
          <div class="card">
            <div class="card-header">
              <h4>Informasi Penerimaan Alat</h4>
              <div class="card-header-form">
              </div>
            </div>
            <form action="{{ route('petugas.order.internal.alkes-reception-store', ['id' => $order->id]) }}" method="POST">
              @csrf

              <div class="card-body p-4 py-0">
                <div class="row">
                    <div class="form-group col">
                        <label><b>Nama Penyerah Barang</b></label>
                        <input type="text" class="form-control" name="contact_person_name" placeholder="Nama Lengkap orang yang menyerahkan Barang" value="{{ $order->contact_person_name }}" readonly>
                    </div>
                    <div class="form-group col">
                        <label><b>Nomor Telepon Penyerah Barang</b></label>
                        <input type="text" class="form-control" name="contact_person_phone" placeholder="Nama Lengkap orang yang menyerahkan Barang" value="{{ $order->contact_person_phone }}" readonly>
                    </div>
                    <div class="form-group col">
                        <label><b>Pemeriksa Barang</b></label>
                        <select name="checker" class="form-control">
                            <option value="" selected hidden>Pilih Petugas Pengecekan Barang</option>
                            @foreach ($officers as $officer)
                                <option value="{{ $officer->name }}">{{ $officer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                  <label><b>Keterangan Order</b></label>
                  <div class="row">
                    <div class="col">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="review_request" id="option-1" checked>
                        <label class="custom-control-label" for="option-1">Kaji Ulang Permintaan</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="calibration_ability" id="option-2" checked>
                        <label class="custom-control-label" for="option-2">Kemampuan Kalibrasi</label>
                      </div>
                    </div>
                    <div class="col">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="officer_readiness" id="option-3" checked>
                        <label class="custom-control-label" for="option-3">Kesiapan Petugas</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="workload" id="option-4" checked>
                        <label class="custom-control-label" for="option-4">Beban Pekerjaan</label>
                      </div>
                    </div>
                    <div class="col">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="equipment_condition" id="option-5" checked>
                        <label class="custom-control-label" for="option-5">Kondisi Peralatan</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="calibration_method_compatibility" id="option-6" checked>
                        <label class="custom-control-label" for="option-6">Kesesuaian Metode Kalibrasi</label>
                      </div>
                    </div>
                    <div class="col">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="accommodation_and_environment" id="option-7" checked>
                        <label class="custom-control-label" for="option-7">Akomodasi & Lingkungan</label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group mt-3">
                  <label><b>Alkes Order Internal</b></label>
                  <div class="row">
                    <table class="table table-sm col">
                      <thead>
                          <tr>
                            <th class="text-center">Alat Kesehatan</th>
                            <th class="text-center" style="width: 10px">Jumlah</th>
                            <th class="text-center">Deskripsi</th>
                          </tr>
                      </thead>
                      <tbody>
                        @for ($i = 0; $i < ceil(count($orders)/2); $i++)
                            <tr>
                              <td>{{ $orders[$i]['alkes'] }}</td>
                              <td class="text-center" id="ammount-{{ $orders[$i]['alkes-id'] }}">{{ $orders[$i]['ammount'] }}</td>
                                <td class="text-center">
                                  <span id="description-id-{{ $orders[$i]['alkes-id'] }}" class="d-none">
                                    {{ $orders[$i]['description']['id'] }}
                                  </span>
                                  {{ $orders[$i]['description']['description'] ?? '-' }}
                                </td>
                            </tr>
                        @endfor
                      </tbody>
                    </table>
                    <table class="table table-sm col">
                      <thead>
                          <tr>
                            <th class="text-center">Alat Kesehatan</th>
                            <th class="text-center" style="width: 10px">Jumlah</th>
                            <th class="text-center">Deskripsi</th>
                          </tr>
                      </thead>
                      <tbody>
                        @for ($i = 0; $i < ceil(count($orders)/2); $i++)
                            <?php $index = $i + ceil(count($orders)/2); ?>
                            @if ($i + ceil(count($orders)/2) < count($orders))
                                <tr>
                                  <td>{{ $orders[$index]['alkes'] }}</td>
                                  <td class="text-center" id="ammount-{{ $orders[$index]['alkes-id'] }}">{{ $orders[$index]['ammount'] }}</td>
                                  <td class="text-center">
                                    <span id="description-id-{{ $orders[$index]['alkes-id'] }}" class="d-none">
                                      {{ $orders[$index]['description']['id'] }}
                                    </span>
                                    {{ $orders[$index]['description']['description'] ?? '-' }}
                                  </td>
                                </tr>
                            @endif
                        @endfor
                      </tbody>
                    </table>
                  </div>
                </div>

                <div class="form-group mt-3">
                  <label><b>Tabel Penerimaan Alat</b></label>
                  <div class="table-responsive">
                    <table class="table table-striped" id="order-table">
                      <tr>
                        <th class="text-center" style="width: 200px">Alat Kesehatan</th>
                        <th class="text-center">Merk</th>
                        <th class="text-center">Model</th>
                        <th class="text-center">No. Seri</th>
                        <th class="text-center" style="width: 120px">Jumlah</th>
                        <th class="text-center">Fungsi</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center" style="width: 15px">Aksi</th>
                      </tr>
                      <tr>
                        <td class="text-center align-middle">
                          <select class="form-control select2 alkes-select" name="alkes[]" id="alkes_0">
                            <option value="-" selected hidden>Alat Kesehatan</option>
                            @foreach ($orders as $data)
                              <option value="{{ $data['alkes-id'] }}">{{ $data['alkes'] }}</option>
                            @endforeach
                            <input type="text" class="d-none" name="description_client_id[]" id="description_client_id_0">
                          </select>
                        </td>
                        <td><input type="text" class="form-control text-center" name="merk[]" id="merk_0"></td>
                        <td><input type="text" class="form-control text-center" name="model[]" id="model_0"></td>
                        <td><input type="text" class="form-control text-center" name="series_number[]" id="series_number_0"></td>
                        <td><input type="number" class="form-control text-center" name="ammount[]" id="ammount_0" value="1"></td>
                        <td>
                          <div class="custom-control custom-radio">
                            <input name="function_0" value="Baik" type="radio" id="function_0_a" class="custom-control-input" checked>
                            <label class="custom-control-label" for="function_0_a">Baik</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input name="function_0" value="Tidak Baik" type="radio" id="function_0_b" class="custom-control-input">
                            <label class="custom-control-label" for="function_0_b">Rusak</label>
                          </div>
                        </td>
                        <td><input type="text" class="form-control text-center" name="description[]" id="description_0"></td>
                        <td class="text-center">
                          <button class="btn btn-sm btn-danger btn_delete" id="btnDelete_0"><i class="fas fa-trash-alt"></i></button>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="4"><b>Total</b></td>
                        <td class="text-center" id="total_ammount">1</td>
                        <td colspan="2"></td>
                        <td class="text-center">
                          <button class="btn btn-primary" id="btnAddRow">+</button>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <div class="card-footer text-right">
                <button class="btn btn-primary px-3">
                  <i class="fas fa-save mr-1"></i>
                  Konfirmasi Penerimaan Alat
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('js-extends')
  <script src="{{ asset('js/order-table/petugas-reception-table.js') }}"></script>
@endsection