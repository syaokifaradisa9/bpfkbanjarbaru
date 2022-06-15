@extends('templates.app')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Pengajuan Eskternal</h1>
    </div>

    <div class="section-body">
      <h2 class="section-title">Pengajuan Eksternal Pengujian dan Kalibrasi Alat Kesehatan</h2>
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
              <h4>Tabel Pengajuan</h4>
              <div class="card-header-form">
              </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-bordered" id="order-table">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 20px">No.</th>
                      <th class="text-center" style="width: 20px">Aksi</th>
                      <th class="text-center" style="width: 120px">Nomor Order</th>
                      <th class="text-center" style="width: 175px">Fasyankes</th>
                      <th class="text-center" style="width: 145px">Contact Person</th>
                      <th class="text-center" style="width: 135px">Estimasi Pengiriman</th>
                      <th class="text-center" style="width: 135px">Estimasi Sampai</th>
                      <th class="text-center">Keterangan</th>
                      <th class="text-center" style="width: 120px">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($orders) > 0)
                      @foreach ($orders as $index => $data)
                        <tr>
                          <td class="text-center">{{ $index + 1 }}</td>
                          <td class="text-center">
                            <div class="btn-group dropright px-0 pr-2">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fas fa-cog"></i>
                                </button>
                                <div class="dropdown-menu dropright">
                                  <a class="dropdown-item has-icon" href="#">
                                    <i class="fas fa-info-circle"></i>
                                    Detail Order
                                  </a>
                                  <a class="dropdown-item has-icon text-success" href="#">
                                    <i class="fas fa-check-circle"></i>
                                    Terima
                                  </a>
                                  <a class="dropdown-item has-icon text-danger" href="#">
                                    <i class="fas fa-window-close"></i>
                                    Tolak
                                  </a>
                                </div>
                              </div>
                          </td>
                          <td class="text-center">{{ $data->number }}</td>
                          <td>
                            {{ $data->user->fasyankes_name." ".$data->user->city." ".$data->user->province }} <br>
                          </td>
                          <td>
                            {{ $data->contact_person_name }} <br>
                            {{ $data->contact_person_phone }}
                          </td>
                          <td class="text-center">{{ date('d-m-Y', strtotime($data->delivery_date_estimation)) }}</td>
                          <td class="text-center">{{ date('d-m-Y', strtotime($data->arrival_date_estimation)) }}</td>
                          <td>{{ $data->description ?? '-' }}</td>
                          <td class="text-center">{{ ucwords(strtolower($data->status)) }}</td>
                        </tr>
                      @endforeach
                    @else
                        <tr>
                          <td colspan="9" class="text-center">
                            Tidak Ada Order!
                          </td>
                        </tr>
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection