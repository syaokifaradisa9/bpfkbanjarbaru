@extends('templates.app')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Pengajuan Internal</h1>
    </div>

    <div class="section-body">
      <h2 class="section-title">Pengajuan Internal Pengujian dan Kalibrasi Alat Kesehatan</h2>
      <p class="section-lead">Melakukan pengujian dan kalibrasi di Loka Pengamanan Fasilitas Kesehatan (LPFK) Banjarbaru</p>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Form Tambah Order</h4>
            </div>
            <form action="{{ route('fasyankes.order.internal.update',['id' => $order->id]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="card-body py-0 px-4">
                <div class="form-group">
                  <label><b>Surat Pengantar</b></label>
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" id="uploaded-file-form" name="letter">
                      <label class="custom-file-label" for="uploaded-file-form" id="uploaded-file-label">Choose file</label>
                  </div>
                  @if ($order->letter_path != null)
                    <small>
                      <br>
                      File surat pengantar anda yang terdahulu dapat dilihat <a href="{{ asset($order->letter_path) }}">disini</a>. (Kosongkan jika tidak ingin mengupdate surat permohonan)
                    </small>
                  @endif
                </div>
                <div class="row mt-4">
                    <div class="form-group col">
                        <label><b>Estimasi Pengiriman Alat</b></label>
                        <input type="date" class="form-control" name="delivery_date_estimation" value="{{ date('Y-m-d',strtotime($order->delivery_date_estimation)) }}">
                    </div>
                    <div class="form-group col">
                        <label><b>Estimasi Alat Sampai di LPFK Banjarbaru</b></label>
                        <input type="date" class="form-control" name="arrival_date_estimation" value="{{ date('Y-m-d', strtotime($order->arrival_date_estimation)) }}">
                    </div>
                </div>
                <div class="row">
                  <div class="form-group col">
                    <label><b>Nama Lengkap Pengantar</b></label>
                    <input type="text" class="form-control" name="contact_person_name" value="{{ $order->contact_person_name }}">
                  </div>
                  <div class="form-group col">
                    <label><b>Nomor Telepon Pengantar</b></label>
                    <input type="text" class="form-control" name="contact_person_phone" value="{{ $order->contact_person_phone }}">
                  </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label><b>Opsi Pengiriman</b></label>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="option1" name="delivery_option" class="custom-control-input" value="Diantar oleh pihak pertama"
                            @if ($order->delivery_option == "Diantar oleh pihak pertama")
                              checked
                            @endif>
                            <label class="custom-control-label" for="option1">Diantar oleh pihak pertama</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="option2" name="delivery_option" class="custom-control-input" value="Diantar oleh pihak ketiga (Mitra/Perusahaan)"
                            @if ($order->delivery_option == "Diantar oleh pihak ketiga (Mitra/Perusahaan)")
                              checked
                            @endif>
                            <label class="custom-control-label" for="option2">Diantar oleh pihak ketiga (Mitra/Perusahaan)</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="option3" name="delivery_option" class="custom-control-input" value="Travel"
                            @if ($order->delivery_option == "Travel")
                              checked
                            @endif>
                            <label class="custom-control-label" for="option3">Via Travel</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="option4" name="delivery_option" class="custom-control-input" value="Ekspedisi"
                            @if ($order->delivery_option == "Ekspedisi")
                              checked
                            @endif>
                            <label class="custom-control-label" for="option4">Via Ekspedisi</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="option5" name="delivery_option" class="custom-control-input" value="Menyerahkan melalui petugas"
                            @if ($order->delivery_option == "Menyerahkan melalui petugas")
                              checked
                            @endif>
                            <label class="custom-control-label" for="option5">Menyerahkan melalui petugas</label>
                        </div>
                    </div>
                    <div class="form-group col @if($order->delivery_travel_name ==null) d-none @endif">
                      <label><b>Nama Travel/Ekspedisi/Pihak Ketiga (Wajib diisi jika ada)</b></label>
                      <input type="text" class="form-control" name="delivery_travel_name" value="{{ $order->delivery_travel_name ?? '' }}">
                  </div>
                </div>
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
                          <th style="width: 2px">Aksi </th>
                        </tr>
                        <?php 
                          $id = 0; 
                          $totalAmmount = 0;
                          $totalPayment = 0;
                        ?>
                        @foreach ($order->alkes_order_with_category as $categoryOrder => $alkesOrder)
                          @foreach ($alkesOrder as $alkesName => $alkesValue)
                              <tr>
                                  <td id="number_{{ $id }}">{{ $id + 1 }}</td>
                                  <td class="pt-3">
                                  <div class="form-group" style="width: 100%">
                                      <select class="form-control select2 category-select" name="category[]" id="category_{{ $id }}">
                                      <option value="-" selected hidden>Pilih Layanan</option>
                                      @foreach ($categories as $data)
                                          <option value="{{ $data->id }}"
                                              @if ($categoryOrder == $data->name)
                                                  selected
                                              @endif>
                                              {{ $data->name }}
                                          </option>
                                      @endforeach
                                      </select>
                                  </div>
                                  </td>
                                  <td class="pt-3">
                                  <div class="form-group align-middle">
                                      <select class="form-control select2 alkes-select" name="alkes[]" id="alkes_{{ $id }}">
                                          @foreach ($categories as $category)
                                              @if ($category->name == $categoryOrder)
                                                  @foreach ($category->alkes as $alkes)
                                                      <option value="{{ $alkes->id }}"
                                                          @if ($alkes->name == $alkesName)
                                                              selected
                                                          @endif>
                                                          {{ $alkes->name }}
                                                      </option>
                                                  @endforeach
                                              @endif
                                          @endforeach
                                      </select>
                                  </div>
                                  </td>
                                  <td id="price_{{ $id }}" class="text-right">{{ $alkesValue['price'] }}</td>
                                  <td class="pt-3">
                                  <div class="form-group">
                                    <input type="number" class="form-control text-center ammount-input" name="ammount[]" id="ammount_{{ $id }}" value="{{ $alkesValue['ammount'] }}">
                                  </div>
                                  </td>
                                  <td class="text-right" id="subtotal_{{ $id }}">
                                      {{ $alkesValue['price'] * $alkesValue['ammount'] }}
                                  </td>
                                  <td class="text-center pt-3">
                                  <div class="form-group">
                                      <textarea class="form-control" name="description[]" id="description_{{ $id }}" value="{{ $alkesValue['description'] }}"> </textarea>
                                  </div>
                                  </td>
                                  <td class="text-center">
                                  <button class="btn btn-sm btn-danger btn_delete" id="btnDelete_{{ $id }}"><i class="fas fa-trash-alt"></i></button>
                                  </td>
                              </tr>
                              <?php 
                                  $id++;
                                  $totalAmmount += $alkesValue['ammount'];
                                  $totalPayment += ($alkesValue['ammount'] * $alkesValue['price']);
                              ?>
                          @endforeach
                        @endforeach
                        <tr>
                          <td colspan="4"><b>Total</b></td>
                          <td class="text-center" id="total_ammount">{{ $totalAmmount }}</td>
                          <td class="text-right" id="total_price">{{ $totalPayment }}</td>
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
                  <button class="btn btn-primary px-3" type="submit">
                    <i class="fas fa-edit mr-1"></i>
                    Edit Pengajuan
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
  <script src="{{ asset('js/form-table/form-order-table-fasyankes.js') }}"></script>
  <script src="{{ asset('js/forms/file-upload-form.js') }}"></script>
@endsection