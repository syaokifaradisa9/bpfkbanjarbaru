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
    </div>
    <form action="{{ route('penyelia.order.internal.officer-update', ['id' => $order->id]) }}" method="post" class="mt-4">
        @csrf
        @method('PUT')
        
        <div class="card-body px-4">
            <div class="row form-group">
                <label class="col-12"><b>Data Order</b></label>
                <div class="col-6 row">
                    <label class="col-4">Nomor Order</label>
                    <p class="col-8">: {{ $order->number }}</p>

                    <label class="col-4">Fasyankes</label>
                    <p class="col-8">: {{ $order->user->fasyankes_name . ' ' . $order->user->city . ' ' . $order->user->province }}</p>
                </div>
            </div>


            <div class="form-group mt-3">
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

            <div class="form-group">
              <label class="mt-3">
                <b>
                  Petugas Kalibrasi
                </b>
              </label>
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
        </div>
        <div class="card-footer text-right">
            <button class="btn btn-primary px-3">
              <i class="fas fa-edit mr-1"></i>
              Edit Petugas
            </button>
        </div>
    </form>
  </div>
@endsection