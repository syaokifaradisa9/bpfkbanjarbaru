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
            <form action="{{ route('fasyankes.order.external.update', ['id' => $order->id]) }}" method="POST" enctype='multipart/form-data'>
              @csrf
              @method('PUT')

              <div class="card-body py-0 px-4">
                <div class="form-group">
                  <label><b>Surat Permohonan</b></label>
                  <div class="custom-file">
                      <input type="file" name="letter" class="custom-file-input" id="uploaded-file-form">
                      <label class="custom-file-label" for="uploaded-file-form" id="uploaded-file-label">Choose file</label>
                  </div>
                  <small>Jika anda tidak memiliki format suratnya maka bisa didownload <a href="https://bpfk-banjarbaru.org/wp-content/uploads/2021/02/MOU-PENGUJIAN-dan-KALIBRASI-LPFK-BJB-Rev.6.docx">disini</a></small>
                  <small>
                    <br>
                    File surat permohonan anda yang terdahulu dapat dilihat <a href="{{ asset('letter_files/'.$order->letter_name) }}">disini</a>. (Kosongkan jika tidak ingin mengupdate surat permohonan)
                </small>
                </div>
                <div class="row">
                  <div class="form-group col">
                    <label><b>Nomor Surat</b></label>
                    <input type="number" class="form-control" name="letter_number" placeholder="Masukkan nomor surat yang telah diupload di atas" value='{{ $order->letter_number }}'>
                    <small>Contoh input nomor surat bisa dilhat <a href="{{ asset('img/contoh_nomor_surat.jpg') }}" target="_blank">disini</a></small>
                  </div>
                  <div class="form-group col">
                    <label><b>Tanggal Surat</b></label>
                    <input type="date" class="form-control" name="letter_date" value="{{ date('Y-m-d', strtotime($order->letter_date)) }}">
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
                  <button class="btn btn-primary px-3">
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