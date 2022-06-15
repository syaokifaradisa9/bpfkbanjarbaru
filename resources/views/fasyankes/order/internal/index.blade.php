@extends('templates.app')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Pengajuan Internal</h1>
      <div class="section-header-breadcrumb">
        <td>
          <a href="{{ route('fasyankes.order.internal.create') }}" class="btn btn-primary">
            <i class="fas fa-plus mr-1"></i>
            Tambah Order
          </a>
        </td>
      </div>
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
                    <th class="text-center" style="width: 30px">Aksi</th>
                    <th>Nomor Order</th>
                    <th class="text-center" style="width: 190px">Surat Permohonan</th>
                    <th class="text-center" style="width: 190px">Waktu Pengajuan</th>
                    <th class="text-center" style="width: 190px">Estimasi Pengiriman</th>
                    <th class="text-center" style="width: 160px">Estimasi Sampai</th>
                    <th style="width: 100px" class="text-center">Status</th>
                  </tr>
                  @if (count($orders) > 0)
                    @foreach ($orders as $index => $data)
                      <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td class="text-center">
                          <div class="btn-group dropright px-0 pr-2">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-cog"></i>
                            </button>
                            <div class="dropdown-menu dropright">
                              <a class="dropdown-item has-icon" href="{{ route('print-offering-letter', ['id' => $data->id]) }}" id="btn-show-offering-letter-{{ $index }}">
                                <i class="fas fa-info-circle"></i>
                                Detail Order
                              </a>
                            </div>
                          </div>
                        </td>
                        <td>{{ $data->number ?? '-'}}</td>
                        <td class="text-center">
                          <a href="{{ asset($data->letter_path) }}" target="_blank">File</a>
                        </td>
                        <td class="text-center">
                          {{ FormatHelper::toIndonesianDateFormat(date('d-m-Y', strtotime($data->created_at))) }} <br>
                          {{ date('H:m', strtotime($data->created_at)) }}
                        </td>
                        <td class="text-center">{{ FormatHelper::toIndonesianDateFormat(date('d-m-Y', strtotime($data->delivery_date_estimation))) }}</td>
                        <td class="text-center">{{ FormatHelper::toIndonesianDateFormat(date('d-m-Y', strtotime($data->arrival_date_estimation))) }}</td>
                        <td class="text-center">
                          @if ($data->status == 'TERKIRIM')
                            <div class="badge badge-secondary">{{ $data->status }}</div>
                          @elseif ($data->status == 'DITOLAK')
                            <div class="badge badge-danger">{{ $data->status }}</div>
                          @elseif ($data->status == 'DITERIMA')
                            <div class="badge badge-success">{{ $data->status }}</div>
                          @endif
                        </td>
                      </tr>
                    @endforeach
                  @else
                      <tr>
                        <td colspan="8" class="text-center text-secondary">
                          Anda Belum Pernah Melakukan Order Internal
                        </td>
                      </tr>
                  @endif
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
@endsection