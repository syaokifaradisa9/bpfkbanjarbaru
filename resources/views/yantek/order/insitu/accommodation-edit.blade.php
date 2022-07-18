@extends('templates.insitu_page_layout')

{{-- Component Utama --}}
@section('sub-content')
  <div class="card">
    <div class="card-header">
      <h4>Edit Akomodasi Order</h4>
    </div>
    <form action="{{ route('yantek.order.insitu.update_accommodation', ['id' => $order_id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card-body py-0 px-4">
          <div class="table-responsive">
            <table class="table table-striped" id="price-table">
              <tr>
                <th style="width: 15px">No.</th>
                <th style="width: 250px">Rincian Biaya</th>
                <th style="width: 250px">Biaya</th>
                <th>Keterangan</th>
                <th style="width: 2px">Aksi</th>
              </tr>
              <tr>
                <td id="number_1" class="text-center">1</td>
                <td class="pt-3">
                  <div class="form-group">
                    <input type="text" class="form-control cost-breakdown-input" name="cost-breakdown[]" value="Biaya Petugas" id="cost-breakdown_0" readonly>
                  </div>
                </td>
                <td class="pt-3">
                  <div class="form-group">
                    <input type="text" class="form-control text-right price-input" name="price[]" value="{{ $prices[0]->price ?? "Rp. 0" }}" id="price_0">
                  </div>
                </td>
                <td class="text-center pt-3">
                  <div class="form-group">
                    <textarea class="form-control" name="description[]" id="description_0">{{ $prices[0]->description ?? '' }}</textarea>
                  </div>
                </td>
                <td class="text-center">
                  -
                </td>
              </tr>
              @if ($prices)
                @foreach ($prices as $index => $price)
                  @if ($index != 0)
                    <tr>
                      <td id="number_{{ $index }}" class="text-center">{{ $index + 2 }}</td>
                      <td class="pt-3">
                        <div class="form-group">
                          <input type="text" class="form-control cost-breakdown-input" name="cost-breakdown[]" id="cost-breakdown_{{ $index }}" value="{{ $price->cost_breakdown }}">
                        </div>
                      </td>
                      <td class="pt-3">
                        <div class="form-group">
                          <input type="text" class="form-control text-right price-input" name="price[]" value="{{ $price->price }}" id="price_{{ $index }}">
                        </div>
                      </td>
                      <td class="text-center pt-3">
                        <div class="form-group">
                          <textarea class="form-control" name="description[]" id="description_{{ $index }}">{{ $price->description }}</textarea>
                        </div>
                      </td>
                      <td class="text-center">
                        <button class="btn btn-sm btn-danger btn_delete" id="btnDelete_{{ $index }}"><i class="fas fa-trash-alt"></i></button>
                      </td>
                    </tr>
                  @endif
                @endforeach
              @else
                <tr>
                  <td id="number_1" class="text-center">2</td>
                  <td class="pt-3">
                    <div class="form-group">
                      <input type="text" class="form-control cost-breakdown-input" name="cost-breakdown[]" id="cost-breakdown_1">
                    </div>
                  </td>
                  <td class="pt-3">
                    <div class="form-group">
                      <input type="text" class="form-control text-right price-input" name="price[]" value="Rp. 0" id="price_1">
                    </div>
                  </td>
                  <td class="text-center pt-3">
                    <div class="form-group">
                      <textarea class="form-control" name="description[]" id="description_1"> </textarea>
                    </div>
                  </td>
                  <td class="text-center">
                    <button class="btn btn-sm btn-danger btn_delete" id="btnDelete_1"><i class="fas fa-trash-alt"></i></button>
                  </td>
                </tr>
              @endif
              <tr>
                <td colspan="2"><b>Total</b></td>
                <td class="text-right" id="total_price">Rp.0</td>
                <td></td>
                <td class="text-center">
                  <button class="btn btn-primary" id="btnAddRow">+</button>
                </td>
              </tr>
            </table>
          </div>
        </div>
        <div class="card-footer text-right">
            <button class="btn btn-primary px-3">
              <i class="fas fa-edit mr-1"></i>
              Edit Akomodasi
            </button>
        </div>
      </form>
  </div>
@endsection

{{-- Javascript External Halaman Index --}}
@section('sub-js-extends')
  <script src="{{ asset('js/order/insitu/yantek/accommodation-form.js') }}"></script>
@endsection