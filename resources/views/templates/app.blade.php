<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>{{ $title }} | BPFK Banjarbaru</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free-5.7.2/css/all.min.css') }}" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('vendor/stisla/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/stisla/css/components.css') }}">
  <link rel="icon" type="image/png" href="{{ asset('img/logo/logo.png') }}" />
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar float-right">
        <ul class="navbar-nav mr-3">
          <li>
            <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg">
              <i class="fas fa-bars"></i>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav navbar-right ml-auto">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset('img/logo/logo.png') }}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">
              @if (Auth::guard('web')->check())
                {{ Auth::guard('web')->user()->fasyankes_name }}
              @else
                {{ Auth::guard('admin')->user()->name }}
              @endif  
            </div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand mt-2">
            <a href="index.html"> <img src="{{ asset('img/logo/logo.png') }}" alt="" style="width: 30px; margin-right: 5px"> BPFK Banjarbaru</a>
          </div>
          <ul class="sidebar-menu mt-4">
              <li class="menu-header">Beranda</li>
              <li class="{{ $menu == 'home' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('home-redirect') }}">
                  <i class="fas fa-home"></i> 
                  <span>Beranda</span>
                </a>
              </li>

              @if (Auth::guard('admin')->check())
                @if(Auth::guard('admin')->user()->role == "YANTEK")
                  <li class="menu-header">Data Master</li>
                  <li class="{{ $menu == 'account' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('yantek.account.index') }}">
                      <i class="fas fa-user"></i>
                      <span>Akun Fasyankes</span>
                    </a>
                  </li>
                @endif
              @endif
              
              <li class="menu-header">Pengajuan</li>
              @if (Auth::guard('web')->check())
                <li class="{{ $menu == 'internal' ? 'active' : '' }}">
                  <a class="nav-link" href="{{ route('order-internal-redirect') }}">
                    <i class="fas fa-building"></i> 
                    <span>Layanan Alat Datang</span>
                  </a>
                </li>
              @else
                @if (Auth::guard('admin')->user()->role == "PENYELIA" || Auth::guard('admin')->user()->role == "BENDAHARA")
                  <li class="{{ $menu == 'internal' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('order-internal-redirect') }}">
                      <i class="fas fa-building"></i> 
                      <span>Layanan Alat Datang</span>
                    </a>
                  </li>
                @endif
              @endif

              @if (Auth::guard('admin')->check())
                @if (Auth::guard('admin')->user()->role == "PETUGAS")
                  <li class="nav-item dropdown @if ($menu == "internal" || $menu == "worksheet") active @endif">
                    <a href="#" class="nav-link has-dropdown">
                      <i class="fas fa-building"></i> 
                      <span>Layanan Alat Datang</span>
                    </a>
                    <ul class="dropdown-menu">
                      <li>
                        <a class="nav-link @if($menu == "internal") text-primary @endif" href="{{ route('petugas.order.internal.index') }}">Order</a>
                      </li>
                      <li>
                        <a class="nav-link @if($menu == "worksheet") text-primary @endif" href="{{ route('petugas.order.internal.worksheet.index') }}">Lembar Kerja</a>
                      </li>
                    </ul>
                  </li>
                @endif
              @endif

              <li class="{{ $menu == 'insitu' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('order-insitu-redirect') }}">
                  <i class="fas fa-hospital"></i> 
                  <span>
                    Layanan Insitu
                  </span>
                </a>
              </li>
            </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2022 <div class="bullet"></div> By <a href="https://bpfk-banjarbaru.org/">LPFK Banjarbaru</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="{{ asset('vendor/stisla/js/stisla.js') }}"></script>

  <script src="{{ asset('vendor/stisla/js/scripts.js') }}"></script>
  @yield('js-extends')
</body>
</html>
