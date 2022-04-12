<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>{{ $title }} | BPFK Banjarbaru</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('vendor/stisla/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/stisla/css/components.css') }}">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch ">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white float-right">
          <div class="p-4 m-3">
            <div class="text-center">
                <img src="{{ asset('img/logo/logo.png') }}" alt="logo" width="60" class="mb-5 mt-2 mr-2">
                <img src="{{ asset('img/logo/logo-kemenkes.png') }}" alt="logo" width="90" class="mb-5 mt-2">
            </div>
            <h4 class="text-dark font-weight-normal text-center">Selamat Datang di <br><span class="font-weight-bold">BPFK Banjarbaru</span></h4>
            <p class="text-muted text-center">Nikmati kemudahan melakukan permintaan pengujian dan kalibrasi alat kesehatan dalam sistem ini.</p>
            @yield('form-content')

            <div class="text-center mt-5 text-small">
              Copyright &copy; BPFK Banjarbaru 2022.
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script src="{{ asset('vendor/stisla/js/stisla.js') }}"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="{{ asset('vendor/stisla/js/scripts.js') }}"></script>
  <script src="../assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
</body>
</html>
