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
              <th class="text-center" style="width: 150px">Nomor Order</th>
              <th class="text-center">Fasyankes</th>
              <th class="text-center" style="width: 150px">Petugas</th>
              <th class="text-center" style="width: 200px">Status</th>
            </tr>
          </thead>
          <tbody>
            @if(count($orders) > 0)
              @foreach ($orders as $index => $data)
                <tr>
                  <td class="text-center">{{ $index + 1 }}</td>
                  <td class="text-center">{{ $data->number }}</td>
                  <td>{{ $data->user->fasyankes_name." ".$data->user->city." ".$data->user->province }}</td>
                  <td class="text-center">
                      <a id="officer-edit-{{ $index }}" href="{{ route('penyelia.order.internal.officer-edit', ['id' => $data->id]) }}">
                        {{ $data->total_officer ?? '0' }} Orang
                      </a>
                  </td>
                  <td id="status-order-{{ $index }}" class="text-center">{{ $data->status }}</td>
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
@endsection

@section('sub-js-extends')
  <script src="{{ asset('js/order-table/penyelia-order-table.js') }}"></script>
@endsection