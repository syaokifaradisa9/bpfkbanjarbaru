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
                <table class="table table-bordered" id="order-table">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 20px">No.</th>
                      <th class="text-center" style="width: 140px">Nomor Order</th>
                      <th class="text-center" style="width: 180px">Fasyenkes</th>
                      <th class="text-center" style="width: 300px">Lokasi</th>
                      <th class="text-center" >Estimasi</th>
                      <th class="text-center" >Petugas</th>
                      <th class="text-center" >Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($orders) > 0)
                      @foreach ($orders as $index => $data)
                        <tr>
                          <td class="text-center">{{ $index + 1 }}</td>
                          <td class="text-center">{{ $data->number }}</td>
                          <td>{{ $data->user->fasyenkes_name." ".$data->user->city." ".$data->user->province }}</td>
                          <td>{{ $data->user->address }}</td>
                          <td class="text-center">
                            <a href="{{ route('penyelia.order.external.edit_estimation', ['id' => $data->id]) }}">
                              {{ $data->estimation_day }} Hari / {{ $data->total_officer_selected ?? '0' }} Petugas
                            </a>
                          </td>
                          <td class="text-center">
                              <a id="officer-edit-{{ $index }}" href="{{ route('penyelia.order.external.officer-edit', ['id' => $data->id]) }}">
                                {{ $data->total_officer_selected ?? '0' }} Orang
                              </a>
                          </td>
                          <td id="status-order-{{ $index }}">{{ $data->status }}</td>
                        </tr>
                      @endforeach
                    @else
                        <tr>
                          <td colspan="9" class="text-center">
                            Anda Belum Pernah Melakukan Order!
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

@section('js-extends')
  <script src="{{ asset('js/order-table/penyelia-order-table.js') }}"></script>
@endsection