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
                    <th class="text-center" style="width: 30px">Aksi</th>
                    <th>Nomor Order</th>
                    <th class="text-center">Tanggal Pengajuan</th>
                    <th class="text-center">Status</th>
                  </tr>
                  @if (count($orders) != 0)
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
                              <a class="dropdown-item has-icon @if($data->status != "MENUNGGU PEMBAYARAN") d-none @endif" href="{{ route('print-offering-letter', ['id' => $data->id]) }}" id="btn-show-offering-letter-{{ $index }}">
                                <i class="fas fa-file-upload"></i>
                                Upload Bukti Bayar
                              </a>
                              <a class="dropdown-item has-icon @if($data->number) d-none @endif" href="{{ route('fasyenkes.order.external.edit', ['id' => $data->id]) }}" id="btn-show-offering-letter-{{ $index }}">
                                <i class="fas fa-edit"></i>
                                Edit
                              </a>
                              <a class="dropdown-item has-icon text-danger @if($data->number) d-none @endif" href="{{ route('print-offering-letter', ['id' => $data->id]) }}" id="btn-show-offering-letter-{{ $index }}">
                                <i class="fas fa-undo"></i>
                                Batalkan
                              </a>
                            </div>
                          </div>
                        </td>
                        <td>
                          @if ($data->status != 'MENUNGGU')
                            {{ $data->number }}
                          @else
                            -
                          @endif
                        </td>
                        <td class="text-center">
                            {{ FormatHelper::toIndonesianDateFormat(date('d-m-Y', strtotime($data->created_at))) }} <br>
                            {{ date('H:m', strtotime($data->created_at)) }}
                        </td>
                        <td class="text-center">
                          <div class="badge badge-secondary">{{ $data->status }}</div>
                        </td>
                      </tr>
                    @endforeach
                  @else
                    <tr>
                      <td colspan="5" class="text-center">Anda Belum Pernah Melakukan Order Apapun!</td>
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