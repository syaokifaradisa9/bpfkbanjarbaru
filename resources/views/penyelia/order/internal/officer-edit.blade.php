@extends('templates.insitu_page_layout')

@section('sub-content')
  @if (Session::has('success'))
    <div class="alert alert-success mb-2">{{ Session::get('success') }}</div>
  @elseif(Session::has('error'))
    <div class="alert alert-danger mb-2">{{ Session::get('error') }}</div>
  @endif
  <div class="card">
    <div class="card-header">
      <h4>Tabel Pengajuan</h4>
    </div>
    <form action="{{ route('penyelia.order.internal.officer-update', ['id' => $order->id]) }}" method="post" class="mt-4" id="officer-edit-form">
        @csrf
        @method('PUT')
        
        <div class="card-body px-4">
            <div class="row form-group">
                <label class="col-12"><b>Data Order</b></label>
                <div class="col-6 row">
                    <label class="col-4">Nomor Order</label>
                    <p class="col-8">: {{ $order->number }}</p>

                    <label class="col-4">Fasyankes</label>
                    <p class="col-8">: {{ $order->user->fasyankes_name . ' ' . $order->user->city . ' ' . $order->user->province }}</p>
                </div>
            </div>


            <div class="form-group mt-3">
              <label>
                <b>
                  Alkes Order Internal
                </b>
              </label>
              <table class="table table-sm table-bordered" id="complete-alkes-order-table">
                <thead>
                    <tr>
                      <th class="text-center" style="width: 75px">No.</th>
                      <th>Alat Kesehatan</th>
                      <th class="text-center" style="width: 200px">Merk</th>
                      <th class="text-center" style="width: 200px">Model</th>
                      <th class="text-center" style="width: 200px">Serial Number</th>
                      <th class="text-center" style="width: 100px">Jumlah</th>
                      <th class="text-center" style="width: 100px">Terpilih</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    $totalAmmount = 0;  
                  ?>
                  @foreach ($order->clean_alkes_orders as $index => $alkesOrder)
                    <tr>
                      <td class="text-center">
                        <span class="d-none" id="alkes-order-id-{{ $index }}">
                          {{ $alkesOrder['id'] }}
                        </span>
                        {{ $index + 1 }}
                      </td>
                      <td id="alkes-{{ $index }}">{{ $alkesOrder['alkes'] }}</td>
                      <td class="text-center" id="merk-{{ $index }}">{{ $alkesOrder['merk'] }}</td>
                      <td class="text-center" id="model-{{ $index }}">{{ $alkesOrder['model'] }}</td>
                      <td class="text-center" id="series_number-{{ $index }}">{{ $alkesOrder['series_number'] }}</td>
                      <td class="text-center" id="max-ammount-{{ $index }}">{{ $alkesOrder['ammount'] }}</td>
                      <td class="text-center" id="references-alkes-ammount-{{ $index }}">
                        0
                      </td>
                      <?php
                        $totalAmmount += $alkesOrder['ammount'];  
                      ?>
                    </tr>
                  @endforeach
                  <tr>
                    <td colspan="5"></td>
                    <td class="text-center">
                      <b id="total-ordered-alkes">
                        {{ $totalAmmount }}
                      </b>
                    </td>
                    <td class="text-center">
                      <b id="references-total-ammount">
                        0
                      </b>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="form-group mt-3">
              <label>
                <b>
                  Petugas Internal
                </b>
              </label>
              <table class="table table-sm table-bordered" id="officer-order-table">
                <thead>
                    <tr>
                      <th class="text-center" style="width: 75px">No.</th>
                      <th style="width: auto">Petugas</th>
                      <th class="text-center" style="width: auto">Alkes terpilih</th>
                    </tr>
                </thead>
                <tbody id="officer-order-table-data">
                  <tr>
                    <td colspan="3" class="text-center text-secondary">
                      Petugas Terpilih Masih Kosong
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="form-group">
              <label class="mt-3">
                <b>
                  Pemilihan Petugas Kalibrasi
                </b>
              </label>
              <table class="table table-striped" id="alkes-order-table">
                <tr>
                  <th style="width: 15px">No.</th>
                  <th style="width: auto">Alat Kesehatan</th>
                  <th style="width: 150px">Jumlah</th>
                  <th style="width: 250px">Petugas</th>
                  <th style="width: 15px">Aksi</th>
                </tr>
                <tr>
                  <td id="number_0">1</td>
                  <td class="pt-3">
                    <div class="form-group" style="width: 100%">
                      <select class="form-control select2 category-select" name="alkes_order[]" id="alkes_order_0">
                        <option value="-" selected hidden>Pilih Alat Kesehatan</option>
                        @foreach ($order->clean_alkes_orders as $index => $data)
                          <option value="{{ $data['id'] }}">
                            {{ "{$data['alkes']}, Merk : {$data['merk']}, Model : {$data['model']}, SN : {$data['series_number']}" }}
                          </option>
                        @endforeach
                      </select>
                    </div>
                  </td>
                  </td>
                  <td class="pt-3">
                    <div class="form-group">
                      <input type="number" class="form-control text-center ammount-input" name="ammount[]" value="1" id="ammount_0">
                    </div>
                  </td>
                  <td class="pt-3">
                    <div class="form-group">
                      <select class="form-control select2 officer-select" name="officers[]" id="officer_0">
                        <option value="-" selected hidden>Pilih Petugas</option>
                        @foreach ($officers as $officer)
                          <option value="{{ $officer->id }}">
                            {{ $officer->name }}
                          </option>
                        @endforeach
                      </select>
                    </div>
                  </td>
                  <td class="text-center">
                    <button class="btn btn-sm btn-danger" id="btnDelete_0">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td colspan="2"><b>Total</b></td>
                  <td class="text-center" id="total_ammount">1</td>
                  <td></td>
                  <td class="text-center">
                    <button class="btn btn-primary" id="btnAddRow">+</button>
                  </td>
                </tr>
              </table>
            </div>
        </div>
        <div class="card-footer text-right">
            <button class="btn btn-primary px-3" type="submit">
              <i class="fas fa-edit mr-1"></i>
              Edit Petugas
            </button>
        </div>
    </form>
  </div>
@endsection

@section('sub-js-extends')
  <script src="{{ asset('js/order/internal/penyelia/officer-edit-validation.js') }}"></script>
  <script src="{{ asset('js/order/internal/penyelia/officer-edit-confirmation.js') }}"></script>
@endsection