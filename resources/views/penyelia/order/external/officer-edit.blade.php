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
            </div>
            <form action="{{ route('penyelia.order.external.officer-update', ['id' => $order->id]) }}" method="post" class="mt-4">
                @csrf
                
                <div class="card-body px-4">
                    <div class="row">
                        <label class="col-12"><b>Data Order</b></label>
                        <div class="col-6 row">
                            <label class="col-4">Nomor Order</label>
                            <p class="col-8">: {{ $order->number }}</p>

                            <label class="col-4">Fasyankes</label>
                            <p class="col-8">: {{ $order->user->fasyankes_name . ' ' . $order->user->city . ' ' . $order->user->province }}</p>

                            <label class="col-4">Lokasi</label>
                            <p class="col-8">: {{ $order->user->address }}</p>

                            <label class="col-4">Estimasi Perjalanan</label>
                            <p class="col-8">: {{ $order->pp_hour }} Jam {{ $order->pp_minute }} Menit</p>

                            <label class="col-4">Estimasi Petugas</label>
                            <p class="col-8">: <span id="max-officer">{{ $order->total_officer }}</span> Orang</p>
                        </div>
                        <div class="col-6 row"></div>
                    </div>

                    <label class="mt-3"><b>Ketua Tim Kalibrasi (Pilih 1 Orang)</b></label>
                    <div class="row px-3">
                        @foreach ($officers as $officer)
                            <div class="custom-control custom-checkbox col-lg-3 col-md-4 mb-1">
                                <input type="checkbox" 
                                       class="custom-control-input officer-chief-checkbox" 
                                       id="officer_chief_{{ $officer->id }}" 
                                       name="chief_{{ $officer->id }}" 
                                       class="officer-checkbox"
                                       @if ($officer->id == $chiefOfficer) checked @endif>
                                <label class="custom-control-label" for="officer_chief_{{ $officer->id }}" name="{{ $officer->id }}" id="officer_chief_name_{{ $officer->id }}">
                                  @if ($officer->id == $chiefOfficer)
                                    <strong>{{ $officer->name }} </strong>
                                  @else
                                    {{ $officer->name }}
                                  @endif
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <label class="mt-3"><b>Petugas Kalibrasi (Pilih {{ $order->total_officer - 1 }} Orang)</b></label>
                    <div class="row px-3">
                        @foreach ($officers as $officer)
                            <div class="custom-control custom-checkbox col-lg-3 col-md-4 mb-1">
                                <input type="checkbox" 
                                       class="custom-control-input officer-checkbox" 
                                       id="{{ $officer->id }}" 
                                       name="officer_{{ $officer->id }}" 
                                       class="officer-checkbox"
                                       @if (in_array($officer->id, $officerExists)) checked @endif>
                                <label class="custom-control-label" for="{{ $officer->id }}" name="{{ $officer->id }}">
                                  @if (in_array($officer->id, $officerExists))
                                    <strong>{{ $officer->name }} </strong>
                                  @else
                                    {{ $officer->name }}
                                  @endif
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary px-3">
                      <i class="fas fa-edit mr-1"></i>
                      Edit Petugas
                    </button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('js-extends')
  <script src="{{ asset('js/forms/officer-form.js') }}"></script>
@endsection