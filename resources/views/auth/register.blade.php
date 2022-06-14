<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Halaman Registrasi | BPFK Banjarbaru 2022</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/selectric/public/selectric.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('vendor/stisla/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/stisla/css/components.css') }}">
  <link rel="icon" type="image/png" href="{{ asset('img/logo/logo.png') }}" />

</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-2">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand text-center">
              <img src="{{ asset('img/logo/logo.png') }}" alt="logo" height="70" class="mr-2">
              <img src="{{ asset('img/logo/logo-kemenkes.png') }}" alt="logo" height="70" class="ml-2">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Form Pendaftaran Akun</h4></div>

              <div class="card-body">
                <form method="POST" action="{{ route('register.store') }}">
                    @csrf

                    <div class="row">
                        <div class="form-group col">
                            <label for="fasyankes_name">Nama Fasyankes</label>
                            <input type="text" class="form-control @error('fasyankes_name') is-invalid @enderror" name="fasyankes_name" id="fasyankes_name" value="{{ old('fasyankes_name') ?? '' }}">
                            @error('fasyankes_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="phone">Telepon</label>
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ?? '' }}">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="type">Tipe</label>
                            <div class="ml-1 mt-2">
                                <div class="custom-control custom-radio col">
                                    <input name="type" value="Negeri" type="radio" id="type-a" class="custom-control-input @error('type') is-invalid @enderror"
                                    @if (old('type') != null)
                                        @if (old('type') == "Negeri") checked @endif
                                    @endif>
                                    <label class="custom-control-label" for="type-a">Negeri</label>
                                </div>
                                <div class="custom-control custom-radio col">
                                    <input name="type" value="Swasta" type="radio" id="type-b" class="custom-control-input @error('type') is-invalid @enderror"
                                    @if (old('type') != null)
                                        @if (old('type') == "Swasta") checked @endif
                                    @endif>
                                    <label class="custom-control-label" for="type-b">Swasta</label>
                                </div>
                            </div>
                            @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="category">Kategori</label>
                            <div class="ml-1 mt-2">
                                <div class="custom-control custom-radio col">
                                    <input name="category" value="Rumah Sakit" type="radio" id="category-a" class="custom-control-input @error('category') is-invalid @enderror"
                                    @if (old('category') != null)
                                        @if (old('category') == "Rumah Sakit") checked @endif
                                    @endif>
                                    <label class="custom-control-label" for="category-a">Rumah Sakit</label>
                                </div>
                                <div class="custom-control custom-radio col">
                                    <input name="category" value="Puskesmas" type="radio" id="category-b" class="custom-control-input @error('category') is-invalid @enderror"
                                    @if (old('category') != null)
                                        @if (old('category') == "Puskesmas") checked @endif
                                    @endif>
                                    <label class="custom-control-label" for="category-b">Puskesmas</label>
                                </div>
                                <div class="custom-control custom-radio col">
                                    <input name="category" value="Lainnya" type="radio" id="category-c" class="custom-control-input @error('category') is-invalid @enderror"
                                    @if (old('category') != null)
                                        @if (old('category') == "Lainnya") checked @endif
                                    @endif>
                                    <label class="custom-control-label" for="category-c">Lainnya</label>
                                </div>
                            </div>
                            @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="type">Provinsi</label>
                            <select class="form-control selectric @error('province') is-invalid @enderror" name="province" id="province">
                                <option value="" selected hidden>Pilih Provinsi</option>
                                <option value="61.Kalimantan Barat"
                                    @if (old('province') != null)
                                        @if (old('province') == "61.Kalimantan Barat") selected @endif
                                    @endif>
                                    Kalimantan Barat</option>
                                <option value="62.Kalimantan Tengah"
                                    @if (old('province') != null)
                                        @if (old('province') == "62.Kalimantan Tengah") selected @endif
                                    @endif>
                                    Kalimantan Tengah</option>
                                <option value="63.Kalimantan Selatan"
                                    @if (old('province') != null)
                                        @if (old('province') == "63.Kalimantan Selatan") selected @endif
                                    @endif>
                                    Kalimantan Selatan</option>
                                <option value="64.Kalimantan Selatan"
                                    @if (old('province') != null)
                                        @if (old('province') == "64.Kalimantan Timur") selected @endif
                                    @endif>
                                    Kalimantan Timur</option>
                                <option value="65.Kalimantan Utara"
                                    @if (old('province') != null)
                                        @if (old('province') == "65.Kalimantan Utara") selected @endif
                                    @endif>
                                    Kalimantan Utara</option>
                            </select>
                            @error('province')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="city">Kota</label>
                            <select class="form-control selectric @error('city') is-invalid @enderror" name="city" id="city">
                                <option value="" selected hidden>-</option>
                            </select>
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') ?? '' }}">
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? '' }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <label for="c_password">Konfirmasi Password</label>
                            <input id="c_password" type="password" class="form-control @error('c_password') is-invalid @enderror" name="c_password">
                            @error('c_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Daftar
                        </button>
                    </div>

                    <div class="text-center mt-2">
                        Jika anda sudah memiliki akun, maka anda bisa login <a href="{{ route('login.index') }}">disini.</a>
                    </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; <a href="https://bpfk-banjarbaru.org/">BPFK Banjarbaru 2022</a> 
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('vendor/stisla/js/stisla.js') }}"></script>

  <!-- Template JS File -->
  <script src="{{ asset('vendor/stisla/js/scripts.js') }}"></script>
  <script src="{{ asset('js/forms/dropdown-location-form.js') }}"></script>
</body>
</html>
