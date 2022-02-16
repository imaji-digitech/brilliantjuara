<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Homepage | Brilliant Juara</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css?_=2728291910" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css?_=2728291910" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontpage/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('frontpage/css/main.css?_='. time()) }}">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container navbar-sect">
        <a class="navbar-brand" href="#page-top">
            <img src="{{ asset('assets/images/logo/logo-frontpage.png?_='. time()) }}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link" href="#services">Layanan</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li> --}}
                {{-- <li class="nav-item"><a class="nav-link" href="#about">About</a></li> --}}
                {{-- <li class="nav-item"><a class="nav-link" href="#team">Team</a></li> --}}
                <li class="nav-item"><a class="nav-link" href="#contact">Kontak</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Masuk</a></li>
{{--                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Daftar</a></li>--}}
            </ul>
        </div>
    </div>
</nav>

<div id="carouselCaptions" class="carousel" data-bs-ride="carousel" data-bs-interval="7200">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('frontpage/images/b.jpeg') }}" class="d-block w-100 h-50" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h3><b>Brilliant Juara 1</b></h3>
                <p>Platform belajar berbasis online berdiri pada tahun 2021, dengan menggunakan media belajar
                    terkini. Bertujuan menyediakan program bimbingan belajar yang terbaik dan memberikan pelayanan
                    untuk mempermudah para pengguna meraih mimpi. </p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('frontpage/images/banner-2.jpg') }}" class="d-block w-100 h-50" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h3><b>Brilliant Juara 2</b></h3>
                <p>Platform belajar berbasis online berdiri pada tahun 2021, dengan menggunakan media belajar
                    terkini. Bertujuan menyediakan program bimbingan belajar yang terbaik dan memberikan pelayanan
                    untuk mempermudah para pengguna meraih mimpi. </p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('frontpage/images/banner-3.jpg') }}" class="d-block w-100 h-50" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h3><b>Brilliant Juara 3</b></h3>
                <p>Platform belajar berbasis online berdiri pada tahun 2021, dengan menggunakan media belajar
                    terkini. Bertujuan menyediakan program bimbingan belajar yang terbaik dan memberikan pelayanan
                    untuk mempermudah para pengguna meraih mimpi. </p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<section class="page-section-mini">
    <div class="container text d-sm-block d-md-none d-lg-none d-xl-none">
        <h3><b>Brilliant Juara</b></h3>
        <p>Platform belajar berbasis online berdiri pada tahun 2021, dengan menggunakan media belajar
            terkini. Bertujuan menyediakan program bimbingan belajar yang terbaik dan memberikan pelayanan
            untuk mempermudah para pengguna meraih mimpi. </p>
    </div>
</section>

<section class="page-section" id="services">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Mengapa Memilih <strong>Brilliant Juara</strong></h2>
        </div>
        <div class="row mt-3" style="justify-content: center;">
            <div class="col-lg-4 mb-3">
                <!-- Portfolio item 1-->
                <div class="portfolio-item">
                    <div class="portfolio-caption">
                        <div class="icon">
                            <i class="fas fa-file-signature fa-3x"></i>
                        </div>
                        <div class="text">
                            <h3 class="portfolio-caption-heading">Paket Soal sesuai Kisi-Kisi dan Akurat </h3>
                            <p class="portfolio-caption-subheading text-muted">Soal-soal pilihan diantaranya diambil
                                dari beberapa soal tes tahun sebelumnya dan merupakan soal terbaik. Soal juga akan
                                selalu diupdate menyesuaikan kisi-kisi yang berlaku dibidangnya masing-masing
                                berdasarkan peraturan pemerintah yang ada.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <!-- Portfolio item 2-->
                <div class="portfolio-item">
                    <div class="portfolio-caption">
                        <div class="icon">
                            <i class="fas fa-door-open fa-3x"></i>
                        </div>
                        <div class="text">
                            <h3 class="portfolio-caption-heading">Pengerjaan Online dan Mudah Diakses</h3>
                            <p class="portfolio-caption-subheading text-muted">Kerjakan dimanapun Sobat Brilli
                                berada, gunakan handphone atau laptop untuk merasakan sensasi soal-soal di Brilliant
                                Juara.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <!-- Portfolio item 3-->
                <div class="portfolio-item">
                    <div class="portfolio-caption">
                        <div class="icon">
                            <i class="fas fa-bullseye fa-3x"></i>
                        </div>
                        <div class="text">
                            <h3 class="portfolio-caption-heading">Simulasi Belajar Terbaik </h3>
                            <p class="portfolio-caption-subheading text-muted">Simulasi belajar berupa tryout yang
                                disediakan dibuat menyerupai tampilan ujian yang sebenarnya dan akan terus diupdate
                                secara berkala.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3 mb-lg-0">
                <!-- Portfolio item 4-->
                <div class="portfolio-item">
                    <div class="portfolio-caption">
                        <div class="icon">
                            <i class="fas fa-graduation-cap fa-3x"></i>
                        </div>
                        <div class="text">
                            <h3 class="portfolio-caption-heading">Pengajar 100% Terbaik Dibidangnya</h3>
                            <p class="portfolio-caption-subheading text-muted">Pengajar di Brilliant Juara dipilih
                                melalui serangkaian proses rekrutmen oleh tim Brilliant Juara dimana setiap mentor
                                memiliki pengalaman dan kualitas dibidangnya dengan kualifikasi pendidikan sesuai
                                dengan bidangnya masing-masing.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3 mb-sm-0">
                <!-- Portfolio item 5-->
                <div class="portfolio-item">
                    <div class="portfolio-caption">
                        <div class="icon">
                            <i class="fas fa-project-diagram fa-3x"></i>
                        </div>
                        <div class="text">
                            <h3 class="portfolio-caption-heading">Terus Berinovasi</h3>
                            <p class="portfolio-caption-subheading text-muted">Brilliant Juara terus berinovasi
                                mengembangkan program-program yang sesuai dengan kebutuhan Sobat Brilli dan berusaha
                                mewujudkan moto kami yaitu “We can make your dream come true”.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="page-section bg-blue" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Hubungi <strong>Kami</strong></h2>
        </div>
        <div class="row mt-3" style="justify-content: center;">
            <div class="col-lg-4 col-sm-6 mb-3">
                <a href="{{ url('https://wa.me/6285890313895') }}" target="_blank"
                   style="text-decoration: none; color: inherit;">
                    <!-- Portfolio item 1-->
                    <div class="contact-item">
                        <div class="contact-caption">
                            <div class="icon">
                                <i class="fab fa-whatsapp fa-3x"></i>
                            </div>
                            <div class="text">
                                <h3 class="portfolio-caption-heading">Whatsapp</h3>
                                <p class="portfolio-caption-subheading">https://wa.me/6285890313895</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-6 mb-3">
                <!-- Portfolio item 2-->
                <a href="mailto:cs.brilliantjuara@gmail.com?subject=Saya Tertarik Dengan Program Brilliant Juara!"
                   style="text-decoration: none; color: inherit;">
                    <div class="contact-item">
                        <div class="contact-caption">
                            <div class="icon">
                                <i class="far fa-envelope fa-3x"></i>
                            </div>
                            <div class="text">
                                <h3 class="portfolio-caption-heading">Email</h3>
                                <p class="portfolio-caption-subheading">cs.brilliantjuara@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<footer class="footer py-4 bg-blue" style="border-top: 1px solid white;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 text-lg-start">Copyright &copy; Brilliant Juara 2022</div>
            <div class="col-lg-2 my-3 my-lg-0" style="text-align:center;">

            </div>
            <div class="col-lg-6 text-lg-end" style="line-height: 4;">
                <a class="btn btn-light btn-social mx-2" href="https://www.youtube.com/channel/UCkErvbG4zicFAQKJ-_9SNYA" target="_blank"><i class="fab fa-youtube"></i></a>
                <a class="btn btn-light btn-social mx-2" href="https://instagram.com/brilliantjuara?utm_medium=copy_link" target="_blank"><i class="fab fa-instagram"></i></a>
                <a class="btn btn-light btn-social mx-2" href="https://vt.tiktok.com/ZSe47WE8N" target="_blank"><i class="fab fa-tiktok"></i></a>
                <a class="btn btn-light btn-social mx-2" href="https://www.twitter.com/brilliantjuara " target="_blank"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-light btn-social mx-2" href="https://t.me/brilliantjuaraofficial" target="_blank"><i class="fab fa-telegram"></i></a>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
<script src="{{ asset('frontpage/js/app.js') }}"></script>
</body>

</html>
