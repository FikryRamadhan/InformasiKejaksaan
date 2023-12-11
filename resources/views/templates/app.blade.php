<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>{{ $title }} | Kejaksaan Kuningan {{ date('Y') }}</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('vendor/stisla/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/stisla/css/components.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/stisla/css/datatables.css') }}">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar float-right">
        <ul class="navbar-nav mr-3">
          <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
        <ul class="navbar-nav navbar-right ml-auto">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            {{-- <img alt="image" src="{{ asset('img/logo/logo.png') }}" class="rounded-circle mr-1"> --}}
            <div class="d-sm-none d-lg-inline-block">
              @if (Auth::guard('web')->check())
                {{ Auth::guard('web')->user()->name }}
              @else
                {{ Auth::guard('admin')->user()->name }}
              @endif  
            </div></a>
            <div class="dropdown-menu dropdown-menu-right">
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
            <a href="index.html"> <img src="{{ asset('img/logo/logoKejaksaan.png') }}" alt="" style="width: 30px; margin-right: 5px"> Kejaksaan Kuningan</a>
          </div>
          <ul class="sidebar-menu mt-4">
            <li class="menu-header">Beranda</li>
            <li class="{{ $menu == 'home' ? 'active' : '' }}">
                <a class="nav-link" href="@if (Auth::guard('web')->check()) {{ route('home') }} @else {{ route('admin.home') }} @endif">
                    <i class="fas fa-home"></i>
                    <span>Beranda</span>
                </a>
            </li>

            <li class="menu-header">Data</li>
            <li class="{{ $menu == 'kriminal' ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('admin.kriminal.index') }}">
                  <i class="fas fa-book"></i>
                  <span>Kriminal</span>
              </a>
            </li>
            
            <li class="menu-header">Kelola Data</li>
            <li class="{{ $menu == 'pelanggar' ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('admin.pelanggar.index') }}">
                  <i class="fas fa-book"></i>
                  <span>Data Pelanggar</span>
              </a>
            </li>
            <li class="{{ $menu == 'saksi' ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('admin.saksi.index') }}">
                  <i class="fas fa-book"></i>
                  <span>Data Saksi</span>
              </a>
            </li>
            <li class="{{ $menu == 'bukti' ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('admin.bukti.index') }}">
                  <i class="fas fa-book"></i>
                  <span>Data Barang Buki</span>
              </a>
            </li>

            @if (Auth::guard('admin')->check())
              <li class="menu-header">Master Data</li>
              <li class="{{ $menu == 'announcement' ? 'active' : '' }}">
                  <a class="nav-link" href="{{ route('admin.announcement.index') }}">
                      <i class="fas fa-bullhorn"></i>
                      <span>Pengumuman</span>
                  </a>
              </li>
              <li class="{{ $menu == 'officer' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.officer.index') }}">
                    <i class="fas fa-bullhorn"></i>
                    <span>Pegawai</span>
                </a>
              </li>
              @if (Auth::guard('admin')->user()->role == "superadmin")
                <li class="{{ $menu == 'account' ? 'active' : '' }}">
                  <a class="nav-link" href="{{ route('admin.account.index') }}">
                      <i class="fas fa-user"></i>
                      <span>Akun</span>
                  </a>
                </li>
              @endif
            @endif
        </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2022
        </div>
        <div class="footer-right">
          <a href="#" class="text-decoration-none text-success">Chelsea</a>
        </div>
      </footer>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="{{ asset('vendor/stisla/js/stisla.js') }}"></script>

  <script src="{{ asset('vendor/stisla/js/scripts.js') }}"></script>
  @yield('js-extends')

  <script src="{{ asset('vendor/stisla/js/jquery-datatables.js') }}"></script>
  <script src="{{ asset('vendor/stisla/js/datatables-bootstrap.js') }}"></script>
  <script>
    $(document).ready(function () {
      $('#datatables').DataTable({
            dom: '<"row"<"col"l><"col"f>>rt<"row"<"col"i><"col"p>>',
            responsive: true
      });
    });
  </script>
</body>
</html>
