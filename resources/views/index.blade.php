<html lang="id" class="fontawesome-i2svg-active fontawesome-i2svg-complete">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Homepage | Brilliant Juara</title>

    <!-- Styles -->

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css?_=2728291910" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css?_=2728291910"
          rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontpage/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('frontpage/css/main.css')}}">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body data-new-gr-c-s-check-loaded="9.52.0" data-gr-ext-installed="">
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container navbar-sect">
        <a class="navbar-brand" href="#page-top">
            <img src="{{asset('assets/images/logo/logo-frontpage.png')}}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <svg class="svg-inline--fa fa-bars ms-1" aria-hidden="true" focusable="false" data-prefix="fas"
                 data-icon="bars" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                <path fill="currentColor"
                      d="M0 96C0 78.33 14.33 64 32 64H416C433.7 64 448 78.33 448 96C448 113.7 433.7 128 416 128H32C14.33 128 0 113.7 0 96zM0 256C0 238.3 14.33 224 32 224H416C433.7 224 448 238.3 448 256C448 273.7 433.7 288 416 288H32C14.33 288 0 273.7 0 256zM416 448H32C14.33 448 0 433.7 0 416C0 398.3 14.33 384 32 384H416C433.7 384 448 398.3 448 416C448 433.7 433.7 448 416 448z"></path>
            </svg><!-- <i class="fas fa-bars ms-1"></i> Font Awesome fontawesome.com -->
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link" href="#services">Layanan</a></li>


                <li class="nav-item"><a class="nav-link" href="#contact">Kontak</a></li>
                <li class="nav-item"><a class="nav-link" href="#faq">FAQ</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Masuk</a></li>

            </ul>
        </div>
    </div>
</nav>

<div id="carouselCaptions" class="carousel" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-indicators">
        @for($i=0;$i<$banners->count();$i++)
            <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="{{ $i }}"
                    @if($i==0) class="active" aria-current="true" @endif
                    aria-label="Slide {{$i+1}}"></button>
        @endfor
        {{--        <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>--}}
        {{--        <button type="button" data-bs-target="#carouselCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>--}}
    </div>
    <div class="carousel-inner" style="margin-top: 100px">
        @foreach($banners as $index=>$banner)
            <div class="carousel-item {{($index==0)?'active':''}}">
                <img src="{{asset('storage/'.$banner->thumbnail)}}" class="d-block"
                     alt="...">
            </div>
        @endforeach
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
                            <svg class="svg-inline--fa fa-file-signature fa-3x" aria-hidden="true" focusable="false"
                                 data-prefix="fas" data-icon="file-signature" role="img"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M292.7 342.3C289.7 345.3 288 349.4 288 353.7V416h62.34c4.264 0 8.35-1.703 11.35-4.727l156.9-158l-67.88-67.88L292.7 342.3zM568.5 167.4L536.6 135.5c-9.875-10-26-10-36 0l-27.25 27.25l67.88 67.88l27.25-27.25C578.5 193.4 578.5 177.3 568.5 167.4zM256 0v128h128L256 0zM256 448c-16.07-.2852-30.62-9.359-37.88-23.88c-2.875-5.875-8-6.5-10.12-6.5s-7.25 .625-10 6.125l-7.749 15.38C187.6 444.6 181.1 448 176 448H174.9c-6.5-.5-12-4.75-14-11L144 386.6L133.4 418.5C127.5 436.1 111 448 92.45 448H80C71.13 448 64 440.9 64 432S71.13 416 80 416h12.4c4.875 0 9.102-3.125 10.6-7.625l18.25-54.63C124.5 343.9 133.6 337.3 144 337.3s19.5 6.625 22.75 16.5l13.88 41.63c19.75-16.25 54.13-9.75 66 14.12C248.5 413.2 252.2 415.6 256 415.9V347c0-8.523 3.402-16.7 9.451-22.71L384 206.5V160H256c-17.67 0-32-14.33-32-32L224 0H48C21.49 0 0 21.49 0 48v416C0 490.5 21.49 512 48 512h288c26.51 0 48-21.49 48-48V448H256z"></path>
                            </svg><!-- <i class="fas fa-file-signature fa-3x"></i> Font Awesome fontawesome.com -->
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
                            <svg class="svg-inline--fa fa-door-open fa-3x" aria-hidden="true" focusable="false"
                                 data-prefix="fas" data-icon="door-open" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M560 448H512V113.5c0-27.25-21.5-49.5-48-49.5L352 64.01V128h96V512h112c8.875 0 16-7.125 16-15.1v-31.1C576 455.1 568.9 448 560 448zM280.3 1.007l-192 49.75C73.1 54.51 64 67.76 64 82.88V448H16c-8.875 0-16 7.125-16 15.1v31.1C0 504.9 7.125 512 16 512H320V33.13C320 11.63 300.5-4.243 280.3 1.007zM232 288c-13.25 0-24-14.37-24-31.1c0-17.62 10.75-31.1 24-31.1S256 238.4 256 256C256 273.6 245.3 288 232 288z"></path>
                            </svg><!-- <i class="fas fa-door-open fa-3x"></i> Font Awesome fontawesome.com -->
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
                            <svg class="svg-inline--fa fa-bullseye fa-3x" aria-hidden="true" focusable="false"
                                 data-prefix="fas" data-icon="bullseye" role="img" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 512 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M288 256C288 273.7 273.7 288 256 288C238.3 288 224 273.7 224 256C224 238.3 238.3 224 256 224C273.7 224 288 238.3 288 256zM112 256C112 176.5 176.5 112 256 112C335.5 112 400 176.5 400 256C400 335.5 335.5 400 256 400C176.5 400 112 335.5 112 256zM256 336C300.2 336 336 300.2 336 256C336 211.8 300.2 176 256 176C211.8 176 176 211.8 176 256C176 300.2 211.8 336 256 336zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 64C149.1 64 64 149.1 64 256C64 362 149.1 448 256 448C362 448 448 362 448 256C448 149.1 362 64 256 64z"></path>
                            </svg><!-- <i class="fas fa-bullseye fa-3x"></i> Font Awesome fontawesome.com -->
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
                            <svg class="svg-inline--fa fa-graduation-cap fa-3x" aria-hidden="true" focusable="false"
                                 data-prefix="fas" data-icon="graduation-cap" role="img"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M623.1 136.9l-282.7-101.2c-13.73-4.91-28.7-4.91-42.43 0L16.05 136.9C6.438 140.4 0 149.6 0 160s6.438 19.65 16.05 23.09L76.07 204.6c-11.89 15.8-20.26 34.16-24.55 53.95C40.05 263.4 32 274.8 32 288c0 9.953 4.814 18.49 11.94 24.36l-24.83 149C17.48 471.1 25 480 34.89 480H93.11c9.887 0 17.41-8.879 15.78-18.63l-24.83-149C91.19 306.5 96 297.1 96 288c0-10.29-5.174-19.03-12.72-24.89c4.252-17.76 12.88-33.82 24.94-47.03l190.6 68.23c13.73 4.91 28.7 4.91 42.43 0l282.7-101.2C633.6 179.6 640 170.4 640 160S633.6 140.4 623.1 136.9zM351.1 314.4C341.7 318.1 330.9 320 320 320c-10.92 0-21.69-1.867-32-5.555L142.8 262.5L128 405.3C128 446.6 213.1 480 320 480c105.1 0 192-33.4 192-74.67l-14.78-142.9L351.1 314.4z"></path>
                            </svg><!-- <i class="fas fa-graduation-cap fa-3x"></i> Font Awesome fontawesome.com -->
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
                            <svg class="svg-inline--fa fa-diagram-project fa-3x" aria-hidden="true" focusable="false"
                                 data-prefix="fas" data-icon="diagram-project" role="img"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                      d="M0 80C0 53.49 21.49 32 48 32H144C170.5 32 192 53.49 192 80V96H384V80C384 53.49 405.5 32 432 32H528C554.5 32 576 53.49 576 80V176C576 202.5 554.5 224 528 224H432C405.5 224 384 202.5 384 176V160H192V176C192 177.7 191.9 179.4 191.7 180.1L272 288H368C394.5 288 416 309.5 416 336V432C416 458.5 394.5 480 368 480H272C245.5 480 224 458.5 224 432V336C224 334.3 224.1 332.6 224.3 331L144 224H48C21.49 224 0 202.5 0 176V80z"></path>
                            </svg><!-- <i class="fas fa-project-diagram fa-3x"></i> Font Awesome fontawesome.com -->
                        </div>
                        <div class="text">
                            <h3 class="portfolio-caption-heading">Terus Berinovasi</h3>
                            <p class="portfolio-caption-subheading text-muted">Brilliant Juara terus berinovasi
                                mengembangkan program-program yang sesuai dengan kebutuhan Sobat Brilli dan berusaha
                                mewujudkan moto kami yaitu ???We can make your dream come true???.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="page-section" id="faq" style="background-color:#fcfcfc ">
    <div class="container">
        <div class="row">
            <div class="col-md-5" style="font-size: 18px">
                <h1>Halo Sobat Brilli</h1>
                <p style="text-align: justify">
                    Berikut ini merupakan beberapa penjelasan dari pertanyaan yang sering diajukan oleh Sobat Brilli
                    yang lain. Apabila Sobat Brilli tidak menemukan penjelasan detail dari permasalahan, Sobat Brilli
                    dapat
                    menghubungi email Brilliant Juara.</p>
            </div>
            @php
                $titles=[
        'CARA MEMBELI PAKET',
        'PRODUK BRILILANT JUARA',
        'CARA MENJADI MEMBER',
        'CARA MENDAPATKAN TOKEN AKSES',
        'CARA MEMILIKI KODE REFERRAL'
    ];
                $contents=[
                    'Klik program Brilliant yang kalian ingin beli dan pilih metode pembayaran lalu pastikan pembayaran sobat Brilli berhasil',
                    'Uji Kompetensi, Seleksi Kedinasan, PPPK, CPNS, SBMPTN',
                    'Pilih regristrasi lalu ikuti semua tahapnya sobat Brilli',
                    'Penuhi syarat yang tertera (kode akan dikirim oleh admin melalui WA)',
                    'Kode referral khusus pengajar Brilliant Juara'
    ]
            @endphp
            <div class="col-md-7" style="font-size: 18px;">
                <h1><br></h1>
                @for($i=0;$i<count($contents);$i++)
                    <div style="background-color: #36A7B3;border-radius: 10px;color: white">
                        <div class="p-3" data-bs-toggle="collapse" data-bs-target="#faq{{$i}}"
                             aria-expanded="false" aria-controls="collapseExample">
                            <span>{{ $titles[$i] }}</span>
                            <span
                                style="float:right;border-radius: 20px;background-color: #faa41b;width: 30px; height: 30px;line-height: 5px; text-align: center">
                                <br>
                        <i class="fa fa-question"></i>
                    </span>
                        </div>
                        <div class="collapse p-3" id="faq{{$i}}">
                            {{ $contents[$i] }}
                        </div>
                    </div>
                    <br>
                @endfor
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
{{--            <div class="col-lg-4 col-sm-4 mb-3">--}}
{{--                <a href="https://wa.me/6285890313895" target="_blank" style="text-decoration: none; color: inherit;">--}}
{{--                    <!-- Portfolio item 1-->--}}
{{--                    <div class="contact-item">--}}
{{--                        <div class="contact-caption">--}}
{{--                            <div class="icon">--}}
{{--                                <svg class="svg-inline--fa fa-facebook fa-3x" aria-hidden="true" focusable="false"--}}
{{--                                     data-prefix="fab" data-icon="facebook" role="img"--}}
{{--                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">--}}
{{--                                    <path d="M40,0H10C4.486,0,0,4.486,0,10v30c0,5.514,4.486,10,10,10h30c5.514,0,10-4.486,10-10V10C50,4.486,45.514,0,40,0z M39,17h-3 c-2.145,0-3,0.504-3,2v3h6l-1,6h-5v20h-7V28h-3v-6h3v-3c0-4.677,1.581-8,7-8c2.902,0,6,1,6,1V17z"></path>--}}
{{--                                </svg><!-- <i class="fab fa-whatsapp fa-3x"></i> Font Awesome fontawesome.com -->--}}
{{--                                <i class="fa fa-facebook"></i>--}}
{{--                            </div>--}}
{{--                            <div class="text">--}}
{{--                                <h3 class="portfolio-caption-heading">Whatsapp</h3>--}}
{{--                                <p class="portfolio-caption-subheading">https://wa.me/6285890313895</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}
            <div class="col-lg-4 col-sm-4 mb-3 mr-3 ml-3">
                <a href="https://wa.me/6285890313895" target="_blank"
                   style="text-decoration: none; color: inherit;">
                    <!-- Portfolio item 1-->
                    <div class="contact-item">
                        <div class="contact-caption">
                            <div class="icon">
                                <svg class="svg-inline--fa fa-whatsapp fa-3x" aria-hidden="true" focusable="false"
                                     data-prefix="fab" data-icon="whatsapp" role="img"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                          d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"></path>
                                </svg><!-- <i class="fab fa-whatsapp fa-3x"></i> Font Awesome fontawesome.com -->
                            </div>
                            <div class="text">
                                <h3 class="portfolio-caption-heading">Whatsapp</h3>
                                <p class="portfolio-caption-subheading">https://wa.me/6285890313895</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-sm-4 mb-3">
                <!-- Portfolio item 2-->
                <a href="mailto:cs.brilliantjuara@gmail.com?subject=Saya Tertarik Dengan Program Brilliant Juara!"
                   style="text-decoration: none; color: inherit;">
                    <div class="contact-item">
                        <div class="contact-caption">
                            <div class="icon">
                                <svg class="svg-inline--fa fa-envelope fa-3x" aria-hidden="true" focusable="false"
                                     data-prefix="far" data-icon="envelope" role="img"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                          d="M448 64H64C28.65 64 0 92.65 0 128v256c0 35.35 28.65 64 64 64h384c35.35 0 64-28.65 64-64V128C512 92.65 483.3 64 448 64zM64 112h384c8.822 0 16 7.178 16 16v22.16l-166.8 138.1c-23.19 19.28-59.34 19.27-82.47 .0156L48 150.2V128C48 119.2 55.18 112 64 112zM448 400H64c-8.822 0-16-7.178-16-16V212.7l136.1 113.4C204.3 342.8 229.8 352 256 352s51.75-9.188 71.97-25.98L464 212.7V384C464 392.8 456.8 400 448 400z"></path>
                                </svg><!-- <i class="far fa-envelope fa-3x"></i> Font Awesome fontawesome.com -->
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
            <div class="col-lg-4 text-lg-start">
                Copyright ?? Brilliant Juara 2022
            </div>
            <div class="col-lg-2 my-3 my-lg-0" style="text-align:center;">
            </div>
            <div class="col-lg-6 text-lg-end" style="line-height: 4;">
                <a class="btn btn-light btn-social mx-2" href="https://www.youtube.com/channel/UCkErvbG4zicFAQKJ-_9SNYA" target="_blank"><i class="fab fa-youtube"></i></a>
                <a class="btn btn-light btn-social mx-2" href="https://instagram.com/brilliantjuara?utm_medium=copy_link" target="_blank"><i class="fab fa-instagram"></i></a>
                <a class="btn btn-light btn-social mx-2" href="https://vt.tiktok.com/ZSe47WE8N" target="_blank"><i class="fab fa-tiktok"></i></a>
                <a class="btn btn-light btn-social mx-2" href="https://www.twitter.com/brilliantjuara " target="_blank"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-light btn-social mx-2" href="https://t.me/brilliantjuaraofficial" target="_blank"><i class="fab fa-telegram"></i></a>
                <a class="btn btn-light btn-social mx-2" href="https://www.facebook.com/brilliantjuara" target="_blank"><i class="fab fa-facebook"></i></a>
            </div>
        </div>
    </div>
</footer>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/gh/jquery/jquery@3.2/dist/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-2.9.2.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
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
