<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>I-JAK</title>
    <!-- Favicons -->
    <link rel="icon" href="{{ asset('img/logo/logoKejaksaan.png') }}">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/enno/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/enno/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/enno/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/enno/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/enno/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/enno/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/stisla/css/components.css') }}"> 
    <link rel="stylesheet" href="{{ asset('vendor/stisla/css/datatables.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body>
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">
            <h1 class="logo"><a href="{{ route('landingpage') }}">I-JAK</a></h1>
            <nav id="navbar" class="navbar">
                <ul>
                    <li>
                        <a class="nav-link scrollto"
                            href="
                @if (Route::current()->getName() == 'landingpage') #
                @else
                    {{ Route('landingpage') }} @endif">
                            Home
                        </a>
                    </li>
                    @if (Route::current()->getName() == 'login')
                        <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
                        <li><a class="nav-link scrollto" href="#services">Layanan</a></li>
                        <li><a class="nav-link scrollto" href="#pengumuman">Pengumuman</a></li>
                    @endif

                    @if (Auth::guard('web')->check() || Auth::guard('admin')->check())
                        <li><a class="nav-link scrollto active"
                                href="@if (Auth::guard('web')->check()) {{ route('home') }} @else {{ route('admin.home') }} @endif">Dashboard</a>
                        </li>
                    @else
                        <li><a class="nav-link scrollto @if (Route::current()->getName() == 'login.index') active @endif"
                                href="{{ route('login.index') }}">Login</a></li>
                    @endif
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>

        </div>
    </header>



    <section id="hero" class="d-flex align-items-center">
        <div class="container mt-5 pt-5">
            <div class="row mt-5 pt-2">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1>I-JAK</h1>
                    <h2>Aplikasi Website Informasi Kejaksaan Kuningan (I-JAK), Menamplikan Data Data Orang Yang Memiliki Kasus
                        Kriminal Di Kab.Kuningan</h2>
                </div>
                <img src="{{ asset('img/logo/kejaksaan.jpg') }}" class="img-fluid animated col-lg-6 order-1" alt=""
                    style="border-radius: 15%;">
            </div>
        </div>

    </section>

    <main id="main">
        <section id="about" class="about mt-5 ">
            <div class="container mt-3">

                <div class="row">
                    <div class="col-lg-6">
                        <img src="{{ asset('img/logo/pegawai.jpeg') }}" class="img-fluid"
                            style="border-radius: 15%; margin-buttom: 20px;" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content">
                        <div class="mt-5 ml-3">
                            <h3>Tentang Kami</h3>
                            <p class="mt-2">
                                Kejaksaan adalah lembaga negara yang melaksanakan kekuasaan negara, khususnya di bidang
                                penuntutan. Sebagai badan yang berwenang dalam penegakan hukum dan keadilan, Kejaksaan
                                dipimpin oleh Jaksa Agung yang dipilih oleh dan bertanggung jawab kepada Presiden.
                                Kejaksaan
                                Agung, Kejaksaan Tinggi, dan Kejaksaan Negeri merupakan kekuasaan negara khususnya
                                dibidang
                                penuntutan, dimana semuanya merupakan satu kesatuan yang utuh yang tidak dapat
                                dipisahkan.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <section id="services" class="services section-bg counts">
            <div class="container">

                <div class="section-title">
                    <span>Layanan</span>
                    <h2>Layanan Web</h2>
                    <p>Layanan dalam website ini ada 3 antara lain</p>
                </div>

                <div class="row counters">
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="icon-box">
                            <span data-purecounter-start="0" data-purecounter-end="1" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <h4>Menyampaikan Berita Terbaru</h4>
                            <p>
                                Dilaksanakan Ketika Kita Mendapatkan Berita Terkini Mengenai Kriminalitas, Kejaksaan,
                                dll
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="icon-box">
                            <span data-purecounter-start="0" data-purecounter-end="2" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <h4>Maklumat Pelayanan</h4>
                            <p>
                                Kami Melakukan Pelayanan Yang Memiliki Standar.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="icon-box">
                            <span data-purecounter-start="0" data-purecounter-end="3" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <h4>Pengawasan</h4>
                            <p>
                                melakukan pengawasan terhadap pelaksanaan putusan pidana bersyarat, putusan pidana
                                pengawasan, dan keputusan lepas bersyarat
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <section id="services" class="services section-bg counts">
            <div class="container">

                <div class="section-title">
                    <span>Data Tersangka 2023</span>
                    <h2>Data Tersangka {{ date('Y') }}</h2>
                    <p>Informasi Terkini Mengenai Data Orang Yang Tersangka</p>
                </div>

                <div class="row counters">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Data Tersangka</h3>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive px-4 pb-4 mt-3">
                                    <table class="table table-bordered" id="datatables">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="width: 20px">No.</th>
                                                <th class="text-center">Nama Tersangka</th>
                                                <th class="text-center">Alamat</th>
                                                <th class="text-center">Saksi Tersangka</th>
                                                <th class="text-center">Pidana</th>
                                                <th class="text-center">Tindakan</th>
                                                <th class="text-center">Barang Bukti</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (count($tersangka) > 0)
                                                @foreach ($tersangka as $index => $data)
                                                    <tr>
                                                        <td class="text-center align-middle">{{ $index + 1 }}</td>
                                                        <td class="text-center align-middle">
                                                            {{ $data->saksi->pelanggar->nama ?? 'Data Pelanggar Terhapus' }}
                                                        </td>
                                                        <td class="text-center align-middle">
                                                            {{ $data->saksi->pelanggar->alamat ?? 'Data Alamat Terhapus' }}
                                                        </td>
                                                        <td class="text-center align-middle">
                                                            {{ $data->saksi->nama ?? 'Data Saksi Terhapus' }}
                                                        </td>
                                                        <td class="text-center align-middle">
                                                            {{ $data->saksi->pelanggar->masa_tahanan ?? 'Data Masa Tahanan Terhapus' }}
                                                        </td>
                                                        <td class="text-center align-middle">
                                                            {{ $data->saksi->pelanggar->kriminal->kriminal_name ?? 'Data Kriminal Terhapus' }}
                                                        </td>
                                                        <td class="text-center align-middle">
                                                            {{ $data->barang_bukti }}
                                                            <br>
                                                            @if ($data)
                                                                <a href="{{ asset('/'.$data->file ) }}" class="text-success" target="_blank">Lihat Photo</a>
                                                            @else
                                                                <p class="text-danger">Tidak Melampirkan File</p>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="9" class="text-center">
                                                        Tersangka Tahun Ini Hilang
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <section id="pengumuman" class="testimonials section-bg">
            <div class="container">
                <div class="section-title">
                    <span>Pengumuman</span>
                    <h2>Pengumuman</h2>
                    <p>Informasi terkini dari pihak Kejaksaan Kuningan</p>
                </div>
                <div>
                    <div class="row">
                        @foreach ($announcements as $data)
                            <div class="col-lg-4">
                                <div class="card mb-2 shadow">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $data->title }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">
                                            {{ date('d-m-y', strtotime($data->created_at)) }}</h6>
                                        @if ($data->file)
                                            <a href="{{ $data->file_path }}" target="_blank">
                                                <i class="fas fa-file-alt mr-1"></i>
                                                Lihat File
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container footer-bottom clearfix">
            <div class="copyright">
                &copy; Copyright <strong><span>Kejaksaan Kuningan 2023</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="https://www.instagram.com/_kyy12y/">Fikry Ramadhan</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/enno/purecounter/purecounter.js') }}"></script>
    <script src="{{ asset('vendor/enno/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/enno/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('vendor/enno/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendor/enno/swiper/swiper-bundle.min.js') }}"></script>

    <script src="{{ asset('vendor/enno/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/enno/jquery-easing/jquery.easing.min.js') }}"></script>


    <!-- Template Main JS File -->
    <script src="{{ asset('vendor/enno/js/index.js') }}"></script>
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="{{ asset('vendor/stisla/js/jquery-datatables.js') }}"></script>
    <script src="{{ asset('vendor/stisla/js/datatables-bootstrap.js') }}"></script>
    <script>
        $('#datatables').DataTable({
            seraching: true,
        })
    </script>
</body>

</html>
