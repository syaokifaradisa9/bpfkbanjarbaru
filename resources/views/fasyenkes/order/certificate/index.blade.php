@extends('templates.app')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Lampiran Order External</h1>
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
            <div class="card-body p-0 row">
              <div class="table-responsive col">
                <table class="table table-sm">
                    <thead>
                        <tr>
                          <th class="text-center">No.</th>
                          <th>Alat Kesehatan</th>
                          <th class="text-center">Sertifikat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < ceil(count($orders)/2); $i++)
                            <tr>
                                <td class="text-center">{{ $i + 1 }}</td>
                                <td>
                                    {{ $orders[$i]->alkes->name }}
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('fasyenkes.order.external.certificates.print', ['id' => $order_id, 'alkes_order_id' => $orders[$i]->id]) }}">
                                        <i class="fas fa-file-alt mr-1"></i> File
                                    </a>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
              </div>
              <div class="table-responsive col">
                <table class="table table-sm col">
                    <thead>
                        <tr>
                          <th class="text-center">No.</th>
                          <th>Alat Kesehatan</th>
                          <th class="text-center">Sertifikat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < ceil(count($orders)/2); $i++)
                            <?php $index = $i + ceil(count($orders)/2); ?>
                            @if ($i + ceil(count($orders)/2) < count($orders))
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td>
                                        {{ $orders[$index]->alkes->name }}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('fasyenkes.order.external.certificates.print', ['id' => $order_id, 'alkes_order_id' => $orders[$index]->id]) }}">
                                            <i class="fas fa-file-alt mr-1"></i> File
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @endfor
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