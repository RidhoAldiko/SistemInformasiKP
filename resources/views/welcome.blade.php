<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Kerja Praktek | Home</title>
    <meta content="" name="description">

    <meta content="" name="keywords">

    <!-- Favicons -->

    <link href="{{ asset('/img/favicon.png') }}" rel="icon">
    <link href="{{asset('/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{ asset('/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{ asset('/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{ asset('/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <link href="{{ asset('/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('/css/style.css')}}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: FlexStart - v1.4.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <i class="fas fa-microscope fa-2x mx-2"></i>
                <span> KERJA PRAKTEK</span>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#tentang">Tentang</a></li>
                    <li><a class="nav-link scrollto" href="#pengumuman">Pengumuman</a></li>
                    <li><a class="nav-link scrollto" href="#judul">Judul</a></li>
                    <li><a class="nav-link scrollto" href="#dosen">Dosen</a></li>
                    <li><a class="getstarted px-3" href="{{ route('login') }}">Masuk</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Tingkatkan Skill dan Pengalaman dengan Kerja Praktek</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">Mari tingkatkan skill dan pengalaman dengan melakukan kerja praktek dan daftarkan penelitian anda sekarang.</h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="{{ route('register') }}" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Daftar Sekarang</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{asset('/img/hero-img.png')}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">


        <!-- ======= Values Section ======= -->
        <section id="tentang" class="values">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <p>Tentang Kerja Praktek</p>
                </header>

                <div class="row justify-content-center">

                    <div class="col-lg-4">
                        <div class="box" data-aos="fade-up" data-aos-delay="200">
                            <img src="{{asset('/img/values-1.png')}}" class="img-fluid" alt="">
                            <h3>Kerja Praktek</h3>
                            <p>Kerja Praktek merupakan suatu bentuk pendidikan dengan cara memberikan pengalaman belajar bagi mahasiswa untuk berpartisipasi dengan tugas langsung di Lembaga Pendidikan, Lembaga Pemerintahan, Perusahaan Swasta dan Luar Negeri.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="box" data-aos="fade-up" data-aos-delay="600">
                            <img src="{{asset('/img/values-3.png')}}" class="img-fluid" alt="">
                            <h3>Kegiatan</h3>
                            <p>Setelah mahasiswa mendapatkan tempat untuk melakukan Kerja Praktek, mahasiswa harus menjalankan penelitian dan hasilnya disusun menjadi laporan yang akan diuji oleh dosen penguji yang telah ditetapkan.</p>
                        </div>
                    </div>

                </div>

            </div>

        </section><!-- End Values Section -->

        <!-- ======= Services Section ======= -->
        <section id="pengumuman" class="services">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <p>Pengumuman</p>
                </header>

                <div class="row gy-4 justify-content-center">

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-box blue">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Lowongan Kerja Praktek Di Rektorat</h3>
                            <p>Bagi mahasiswa yang ingin melakukan kerja praktek di rektorat, silahkan temui prodi secepatnya. kuota terbatas.</p>
                            <a href="#" class="read-more"><span>Selengkapnya</span> <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-box blue">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Kegiatan KP di Malaysia</h3>
                            <small>Terbit Tanggal 05-03-2020</small>
                            <p>Bagi yang berminat untuk melakukan KP di Malaysia, silahkan hubungi pihak program studi untuk mendaftar</p>
                            <a href="#" class="read-more"><span>Selengkapnya</span> <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>


                </div>

            </div>

        </section><!-- End Services Section -->

        <!-- ======= Pricing Section ======= -->
        <section id="judul" class="pricing">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <p>Judul Penelitian</p>
                </header>

                <div class="row gy-4 justify-content-center" data-aos="fade-left">


                    <div class="card shadow">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Judul</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Jepri Alber</td>
                                            <td>Aplikasi Pelayanan Masyarakat Terpadu Berbasis Mobile</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Muhammad Arif</td>
                                            <td>Aplikasi Pencarian Wisata Berbasis Web Di Riau</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Larry</td>
                                            <td>Aplikasi Pendaftaran Siswa Magang Di Bpr Panam</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section><!-- End Pricing Section -->

        <!-- ======= Team Section ======= -->
        <section id="dosen" class="team">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <p>Dosen Teknik Informatika</p>
                </header>

                <div class="row gy-4">


                    @foreach ($results as $result)
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{asset('/img/team/team-1.jpg')}}" class="img-fluid" alt="">
                            </div>
                            <div class="member-info">
                                <h4>{{$result->nm_dosen}}</h4>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>

            </div>

        </section><!-- End Team Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-5 col-md-12 footer-info">
                        <a href="index.html" class="d-flex align-items-center">
                            <img src="{{asset('/img/uir-logo.png')}}" class="img-fluid" alt="Responsive image">
                        </a>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram bx bxl-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin bx bxl-linkedin"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>WEBSITE</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Universitas Islam Riau</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Fakultas Teknik</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Teknik Informatika</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Panduan Mahasiswa/i</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                        <h4>KONTAK</h4>
                        <p>
                            <strong>Telpon:</strong> +62.761.7212625<br>
                            <strong>Email:</strong> informatics@uir.ac.id<br>
                            <strong>Alamat:</strong> Jl. Kaharuddin Nasution No.113 Perhentian Marpoyan Pekanbaru, Riau, Indonesi<br><br>
                        </p>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Teknik Informatika</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
                <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapM</a> -->
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <script src="{{asset('/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{asset('/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('/vendor/purecounter/purecounter.js')}}"></script>
    <script src="{{asset('/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('/vendor/glightbox/js/glightbox.min.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('/js/main.js')}}"></script>

</body>

</html>