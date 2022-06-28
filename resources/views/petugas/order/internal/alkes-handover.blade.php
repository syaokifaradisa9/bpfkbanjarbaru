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
            <form action="{{ route('petugas.order.internal.alkes-handover-store', ['id' => $order->id]) }}" method="POST">
              @csrf
              @method('PUT')

              <div class="card-body p-4 py-0">
                <div class="form-group">
                    <label>
                      <b>
                        Alkes Order Internal
                      </b>
                    </label>
                    <table class="table table-sm table-bordered">
                      <thead>
                          <tr>
                            <th class="text-center" style="width: 75px">No.</th>
                            <th>Alat Kesehatan</th>
                            <th class="text-center" style="width: 200px">Merk</th>
                            <th class="text-center" style="width: 200px">Model</th>
                            <th class="text-center" style="width: 200px">Serial Number</th>
                            <th class="text-center" style="width: 100px">Jumlah</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php
                          $totalAmmount = 0;  
                        ?>
                        @foreach ($order->clean_alkes_orders as $index => $alkesOrder)
                        <tr>
                          <td class="text-center">{{ $index + 1 }}</td>
                          <td>{{ $alkesOrder['alkes'] }}</td>
                          <td class="text-center">{{ $alkesOrder['merk'] }}</td>
                          <td class="text-center">{{ $alkesOrder['model'] }}</td>
                          <td class="text-center">{{ $alkesOrder['series_number'] }}</td>
                          <td class="text-center">{{ $alkesOrder['ammount'] }}</td>
                          <?php
                            $totalAmmount += $alkesOrder['ammount'];  
                          ?>
                        </tr>
                        @endforeach
                        <tr>
                          <td colspan="5"></td>
                          <td class="text-center">
                            <b>
                              {{ $totalAmmount }}
                            </b>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="row">
                    <div class="form-group col">
                        <label><b>Nama Penerima Barang</b></label>
                        <input type="text" class="form-control" name="contact_person_receiver_name" placeholder="Nama Lengkap orang yang Menerima Barang" value="{{ $order->contact_person_name }}">
                    </div>
                    <div class="form-group col">
                        <label><b>Nomor Telepon Penerima Barang</b></label>
                        <input type="text" class="form-control" name="contact_person_receiver_phone" placeholder="Nomor Telepon orang yang Menerima Barang" value="{{ $order->contact_person_phone }}">
                    </div>
                </div>

                <div class="form-group">
                  <label><b>Keterangan Penyerahan Alat</b></label>
                  <div class="row">
                    <div class="col">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="alkes_accordingly" id="option-1" checked>
                        <label class="custom-control-label" for="option-1">Diserahkan Alat/Barang sesuai dengan daftar di atas</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="certificate_handedover" id="option-2" checked>
                        <label class="custom-control-label" for="option-2">Diserahkan Sertifikat/Lembar Hasil Pengujian /Kalibrasi Sesuai dengan Daftar di atas</label>
                      </div>
                    </div>
                    <div class="col">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="cancel_test" id="option-3">
                        <label class="custom-control-label" for="option-3">Batal diuji/dikalibrasi (dalam keterangan)</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="alkes_checked" id="option-4" checked>
                        <label class="custom-control-label" for="option-4">Alat/Barang atau Dokumen sudah diperiksa oleh pelanggan</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer text-right">
                <button class="btn btn-primary px-3">
                  <i class="fas fa-save mr-1"></i>
                  Konfirmasi Penyerahan Alat
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection