@extends('templates.app')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Pengajuan Eskternal</h1>
    </div>

    <div class="section-body">
      <h2 class="section-title">Pengajuan Eskternal Pengujian dan Kalibrasi Alat Kesehatan</h2>
      <p class="section-lead">Melakukan pengujian dan kalibrasi langsung di tempat fasyankes berada</p>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Form Tambah Order</h4>
            </div>
            <form action="{{ route('petugas.order.external.append', ['order_id' => $order_id]) }}" method="POST">
              @csrf

              <div class="card-body py-0 px-4">
                <div class="form-group">
                <div class="form-group">
                  <label class="mt-3"><b>Alat Kesehatan</b></label>
                  <div class="table-responsive">
                    <table class="table table-striped" id="alkes-order-table">
                      <tr>
                        <th style="width: 15px">No.</th>
                        <th style="width: 187px">Layanan</th>
                        <th style="width: 230px">Alat Kesehatan</th>
                        <th style="width: 140px">Tarif</th>
                        <th style="width: 121px">Jumlah</th>
                        <th style="width: 148px">Sub Total</th>
                        <th>Keterangan</th>
                        <th style="width: 2px">Aksi</th>
                      </tr>
                      <tr>
                        <?php $id = 0; ?>
                        <td id="number_{{ $id }}">1</td>
                        <td class="pt-3">
                          <div class="form-group" style="width: 100%">
                            <select class="form-control select2 category-select" name="category[]" id="category_{{ $id }}">
                              <option value="-" selected hidden>Pilih Layanan</option>
                              @foreach ($categories as $data)
                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                              @endforeach
                            </select>
                          </div>
                        </td>
                        <td class="pt-3">
                          <div class="form-group align-middle">
                            <select class="form-control select2 alkes-select" name="alkes[]" id="alkes_{{ $id }}">
                              <option value="-">-</option>
                            </select>
                          </div>
                        </td>
                        <td id="price_0" class="text-right">Rp. 0</td>
                        <td class="pt-3">
                          <div class="form-group">
                            <input type="number" class="form-control text-center ammount-input" name="ammount[]" value="1" id="ammount_{{ $id }}">
                          </div>
                        </td>
                        <td class="text-right" id="subtotal_0"></td>
                        <td class="text-center pt-3">
                          <div class="form-group">
                            <textarea class="form-control" name="description[]" id="description_{{ $id }}"> </textarea>
                          </div>
                        </td>
                        <td class="text-center">
                          <button class="btn btn-sm btn-danger btn_delete" id="btnDelete_0"><i class="fas fa-trash-alt"></i></button>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="4"><b>Total</b></td>
                        <td class="text-center" id="total_ammount">4</td>
                        <td class="text-right" id="total_price">Rp.0</td>
                        <td></td>
                        <td class="text-center">
                          <button class="btn btn-primary" id="btnAddRow">+</button>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div> 
              </div>
              <div class="card-footer text-right">
                  <button class="btn btn-primary px-3">Kirim Pengajuan</button>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </section>
@endsection

@section('js-extends')
  <script src="{{ asset('js/form-table/form-order-table-fasyankes.js') }}"></script>
@endsection