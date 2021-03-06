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
              <h4>Tabel Pengajuan</h4>
              <div class="card-header-form">
                <form>
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <div class="input-group-btn">
                      <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped">
                  <tr>
                    <th class="text-center" style="width: 30px">No.</th>
                    <th>Nomor Order</th>
                    <th class="text-center" style="width: 190px">Tanggal Pengajuan</th>
                    <th class="text-center" style="width: 190px">Estimasi Pengiriman</th>
                    <th class="text-center" style="width: 160px">Estimasi Sampai</th>
                    <th style="width: 100px" class="text-center">Status</th>
                    <th style="width: 250px" class="text-center">Aksi</th>
                  </tr>
                  @foreach ($orders as $index => $data)
                    <tr>
                      <td class="text-center">{{ $index + 1 }}</td>
                      <td>{{ $data->number }}</td>
                      <td class="text-center">{{ date('d-m-Y', strtotime($data->created_at)) }}</td>
                      <td class="text-center">{{ date('d-m-Y', strtotime($data->delivery_date_estimation)) }}</td>
                      <td class="text-center">{{ date('d-m-Y', strtotime($data->arrival_date_estimation)) }}</td>
                      <td class="text-center">
                        @if ($data->status == 'TERKIRIM')
                          <div class="badge badge-secondary">{{ $data->status }}</div>
                        @elseif ($data->status == 'DITOLAK')
                          <div class="badge badge-danger">{{ $data->status }}</div>
                        @elseif ($data->status == 'DITERIMA')
                          <div class="badge badge-success">{{ $data->status }}</div>
                        @endif
                      </td>
                      <td class="text-center">
                        <a href="#" class="btn btn-primary">Detail</a>
                        @if ($data->status == 'TERKIRIM')
                          <form action="{{ route('yantek.order.internal.accept') }}" method="post" class="d-inline">
                            @method('PUT')
                            @csrf

                            <input type="hidden" readonly value="{{ $data->id }}" name="order_id">
                            <button class="btn btn-success" type="submit">Terima</button>
                          </form>
                          <form action="{{ route('yantek.order.internal.reject') }}" method="post" class="d-inline">
                            @method('PUT')
                            @csrf

                            <input type="hidden" readonly value="{{ $data->id }}" name="order_id">
                            <button class="btn btn-danger" type="submit">Tolak</button>
                          </form>
                        @endif
                      </td>
                    </tr>
                  @endforeach
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
@endsection