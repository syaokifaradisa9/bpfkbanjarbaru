@extends('templates.app')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Pengajuan Eskternal</h1>
      <div class="section-header-breadcrumb">
        <td><a href="{{ route('fasyenkes.order.external.create') }}" class="btn btn-primary">Tambah Order</a></td>
      </div>
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
                    <th class="text-center">Tanggal Pengajuan</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                  @foreach ($orders as $index => $data)
                    <tr>
                      <td class="text-center">{{ $index + 1 }}</td>
                      <td>{{ $data->number }}</td>
                      <td class="text-center">{{ date('d-m-Y', strtotime($data->created_at)) }}</td>
                      <td class="text-center">
                        <div class="badge badge-secondary">{{ $data->status }}</div>
                      </td>
                      <td class="text-center">
                        <a href="#" class="btn btn-primary">Detail</a>
                        <a href="#" class="btn btn-warning">Edit</a>
                        @if (!$data->number)
                          <form action="{{ route('fasyenkes.order.external.cancel') }}" method="post" class="d-inline">
                            @csrf
                            <input type="hidden" value="{{ $data->id }}" name="id" readonly>
                            <button type="submit" class="btn btn-danger">Batalkan</button>
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