<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>GO-SARI ECOLOG</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/logo.ico" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/landing/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/landing/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/landing/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/landing/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/landing/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">


    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/') ?>css/sb-admin-2.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: FlexStart
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Updated: Jun 29 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="<?= base_url('Landing'); ?>" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="assets/img/logo.ico" alt="GO-SARI">
                <h1 class="sitename">ECOLOG</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Home<br></a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#statistics">Statistics</a></li>
                    <li><a href="#values">Benefit</a></li>
                    <li><a href="#location">Location</a></li>
                    <li><a href="#faq">FAQ</a></li>
                    <li><a href="#team">Team</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted flex-md-shrink-0" href="<?= base_url('Auth'); ?>">Login</a>

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section" style="background: linear-gradient(to bottom, #5fbab4, white);">

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h1 data-aos="fade-up">GO-SARI ECOLOG</h1>
                        <p data-aos="fade-up" data-aos-delay="100">Kami hadir sebagai solusi dari permasalahan sampah Anda</p>
                        <div class="d-flex flex-column flex-md-row" data-aos="fade-up" data-aos-delay="200">
                            <a href="#about" class="btn-get-started">Get Started<i class="bi bi-arrow-right"></i></a>
                            <a href="https://youtu.be/Tp1jpaQgkmE?si=1ugS8SN4XF6oHOOE" class="glightbox btn-watch-video d-flex align-items-center justify-content-center ms-0 ms-md-4 mt-4 mt-md-0"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                        <img src="assets/img/landing.png" class="img-fluid animated" alt="">
                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->

        <!-- Features Section -->
        <section id="hero" class="features section" style="background: linear-gradient(to bottom, white, #daf8f6);">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">

                <p>GO-SARI untuk lingkungan yang lebih sehat<br></p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-5">

                    <div class="col-xl-6" data-aos="zoom-out" data-aos-delay="100">
                        <img src="assets/img/feature.png" class="img-fluid" alt="">
                    </div>

                    <div class="col-xl-6 d-flex">
                        <div class="row align-self-center gy-4">

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <div class="ms-3"> <!-- Menambahkan margin start -->
                                        <h3>Pengurangan Sampah</h3>
                                        <p class="mt-2">Membantu mengurangi jumlah sampah yang dibuang ke tempat pembuangan akhir (TPA) dengan meningkatkan partisipasi dalam pengelolaan sampah.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Feature Item -->

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <div class="ms-3"> <!-- Menambahkan margin start -->
                                        <h3>Daur Ulang</h3>
                                        <p class="mt-2">Mendorong praktik daur ulang, yang membantu mengurangi penggunaan sumber daya baru dan mengurangi limbah.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Feature Item -->

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <div class="ms-3"> <!-- Menambahkan margin start -->
                                        <h3>Kesadaran Lingkungan</h3>
                                        <p class="mt-2">Meningkatkan kesadaran masyarakat tentang pentingnya pengelolaan sampah dan dampak lingkungan dari sampah yang tidak terkelola dengan baik.</p>
                                    </div>
                                </div>
                            </div><!-- End Feature Item -->

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <div class="ms-3"> <!-- Menambahkan margin start -->
                                        <h3>Peningkatan Kualitas Lingkungan</h3>
                                        <p class="mt-2">Dengan mengelola sampah secara baik, kualitas lingkungan, termasuk udara dan tanah, dapat meningkat, mengurangi pencemaran.</p>
                                    </div>
                                </div>
                            </div><!-- End Feature Item -->

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <div class="ms-3"> <!-- Menambahkan margin start -->
                                        <h3>Keterlibatan Komunitas</h3>
                                        <p class="mt-2">Mengajak masyarakat untuk terlibat dalam program pengelolaan sampah, menciptakan rasa kebersamaan dan tanggung jawab bersama.</p>
                                    </div>
                                </div>
                            </div><!-- End Feature Item -->

                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <div class="ms-3"> <!-- Menambahkan margin start -->
                                        <h3>Pendidikan Lingkungan</h3>
                                        <p class="mt-2">Menjadi bagian dari program yang sering menyediakan edukasi dan pelatihan tentang pengelolaan sampah yang berkelanjutan.</p>
                                    </div>
                                </div>
                            </div><!-- End Feature Item -->

                        </div>
                    </div>

                </div>

            </div>

        </section><!-- /Features Section -->

        <!-- About Section -->
        <section id="about" class="about section" style="background: linear-gradient(to bottom, #daf8f6, white);">
            <div class="container section-title" data-aos="fade-up">
                <h2>About Us</h2>
                <p>Tentang Kami<br></p>
            </div><!-- End Section Title -->


            <div class="container" data-aos="fade-up">
                <div class="row gx-0">

                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="content">
                            <h2>TPS GO-SARI</h2>
                            <p>
                                TPS GO-SARI adalah salah satu unit usaha Badan usaha milik Kalurahan Guwosari yang bergerak di bidang pengelolaan sampah, GO-SARI berdiri sejah November 2019. TPS GO-SARI terletak di Kalurahan Guwosari, Kapanewon Pajangan, Kabupaten Bantul. TPS GO-SARI berhasil melakukan pengolahan sampah hingga menghasilkan rupiah. GO-SARI mampu mengelola sampah secara mandiri dengan konsep zero waste atau pengelolaan dengan melakukan pemilahan, pengomposan, dan pengumpulan barang layak jual. Sekitar 1 ton sampah per hari bisa diolah menjadi berkah.
                            </p>

                        </div>
                    </div>

                    <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                        <img src="assets/img/about.png" class="img-fluid" alt="">
                    </div>

                </div>
            </div>



        </section><!-- /About Section -->


        <!-- Values Section -->
        <section id="statistics" class="statistics section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Statistics</h2>
                <p>Statistik Sampah TPS GO-SARI<br></p>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row justify-content-center">
                    <!-- Grafik Sampah Masuk & Terjual -->
                    <div class="card shadow" data-aos="fade-up">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-primary">Sampah Masuk dan Terjual</h6>
                            <div>
                                <select id="chartType" class="form-control">
                                    <option value="area">Line Chart</option>
                                    <option value="bar">Bar Chart</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-body" data-aos="fade-up">
                            <canvas id="combinedChart"></canvas>
                        </div>
                    </div>

                </div>
            </div>



        </section><!-- /Values Section -->

        <!-- Stats Section -->
        <section id="stats" class="stats section" style="background: linear-gradient(to top, #daf8f6, white);">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item d-flex align-items-center w-100 h-100">
                            <i class="fas fa-fw fa-users"></i>
                            <div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $nasabah_count; ?></div>
                                <p>Jumlah Nasabah</p>
                            </div>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item d-flex align-items-center w-100 h-100">
                            <i class="fas fa-fw fa-layer-group"></i>
                            <div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $kategori_count; ?></div>
                                <p>Kategori Sampah</p>
                            </div>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item d-flex align-items-center w-100 h-100">
                            <i class="fas fa-fw fa-truck-moving"></i>
                            <div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($sampah_masuk_count, 2, ",", ".") ?> Kg</div>
                                <p>Sampah Masuk</p>
                            </div>
                        </div>
                    </div><!-- End Stats Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item d-flex align-items-center w-100 h-100">
                            <i class="fas fa-fw fa-shopping-cart"></i>
                            <div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($sampah_terjual_count, 2, ",", ".") ?> Kg
                                </div>
                                <p>Sampah Terjual</p>
                            </div>
                        </div>
                    </div><!-- End Stats Item -->

                </div>

            </div>

        </section><!-- /Stats Section -->
        <!-- Values Section -->
        <section id="values" class="values section" style="background: linear-gradient(to bottom, #daf8f6, white);">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>BENEFIT</h2>
                <p>Apa saja keuntungan menjadi nasabah GO-SARI?<br></p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card">
                            <img src="assets/img/value1.png" class="img-fluid" alt="">
                            <h3>Nasabah baru mendapatkan edukasi tentang pilah sampah</h3>
                            <p>Setiap nasabah baru akan diberikan pendidikan dan pelatihan mengenai cara memisahkan sampah dengan benar.</p>
                        </div>
                    </div><!-- End Card Item -->

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="card">
                            <img src="assets/img/value2.png" class="img-fluid" alt="">
                            <h3>Nasabah mendapat stimulan kantong pilah sampah</h3>
                            <p>Sebagai bagian dari program, nasabah akan mendapatkan kantong khusus untuk memisahkan sampah mereka.</p>
                        </div>
                    </div><!-- End Card Item -->

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="card">
                            <img src="assets/img/value3.png" class="img-fluid" alt="">
                            <h3>Sampah akan tetap diambil walaupun TPA tutup</h3>
                            <p>Layanan pengambilan sampah tetap berjalan meskipun tempat pembuangan akhir (TPA) sedang tidak beroperasi.</p>
                        </div>
                    </div><!-- End Card Item -->

                </div>

            </div>

        </section><!-- /Values Section -->

        <section id="location" style="background: linear-gradient(to top, #daf8f6, white);">
            <div class="container section-title" data-aos="fade-up">
                <h2>Location</h2>
                <p>Lokasi Kami</p>
            </div><!-- End Section Title -->

            <div class="container-fluid" style="height: 70vh;">
                <div class="card rounded" data-aos="fade-up">
                    <div class="card-body p-0">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item rounded justify-center" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.154174056476!2d110.30737349999997!3d-7.878932400000011!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7af939470b83a7%3A0xc892052ce10ccbd9!2sGo-Sari%20(unit%20layanan%20kebersihan%20BUMDes%20Guwosari)!5e0!3m2!1sid!2sid!4v1721229038284!5m2!1sid!2sid" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Faq Section -->
        <section id="faq" class="faq section" style="background: linear-gradient(to bottom, #daf8f6, white);">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>F.A.Q</h2>
                <p>Pertanyaan Umum tentang GO-SARI</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row">

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">

                        <div class="faq-container">

                            <div class="faq-item">
                                <h3>Berapa biaya pendaftaran menjadi nasabah TPS GO-SARI?</h3>
                                <div class="faq-content">
                                    <p>Biaya pendaftaran nasabah GO-SARI dikenakan biaya Rp. 50.000</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3>Berapa biaya bulanan nasabah TPS GO-SARI?</h3>
                                <div class="faq-content">
                                    <p>Biaya langganan dikenakan Rp. 30.000/bulan.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3>Apa syarat menjadi nasabah TPS GO-SARI?</h3>
                                <div class="faq-content">
                                    <p>Sampah yang diterima adalah skala rumah tangga, sampah wajib dipilah dari rumah, wajib dibungkus kantong plastik.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3>Apa saja jenis sampah yang diterima TPS GO-SARI?</h3>
                                <div class="faq-content">
                                    <p>Sampah yang diterima adalah sampah dengan kategori: rongsok, bosok, gondong tok, dan popok.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                        </div>

                    </div><!-- End Faq Column-->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">

                        <div class="faq-container">
                            <div class="faq-item">
                                <h3>Apa itu sampah rongsok?</h3>
                                <div class="faq-content">
                                    <p>Sampah yang dikategorikan sebagai sampah <strong>RONGSOK</strong> adalah barang-barang bekas atau limbah yang masih memiliki nilai ekonomi dan dapat dijual atau didaur ulang. Biasanya, sampah rongsok mencakup berbagai jenis barang seperti logam, plastik, kertas, kaca, dan barang elektronik bekas.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3>Apa itu sampah bosok?</h3>
                                <div class="faq-content">
                                    <p>Sampah yang dikategorikan sebagai sampah <strong>BOSOK</strong> adalah sampah yang sudah sangat kotor, tidak terpakai, atau tidak dapat lagi dimanfaatkan secara langsung. Sampah bosok biasanya tidak memiliki nilai ekonomi yang tinggi seperti sampah rongsok, karena kondisinya yang sudah sangat buruk atau tidak layak pakai.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3>Apa itu sampah gondong tok?</h3>
                                <div class="faq-content">
                                    <p>Sampah yang dikategorikan sebagai sampah <strong>GONDONG TOK</strong> adalah sampah yang tergolong ringan atau organik yang berupa daun-daunan. Sampah ini akan dialokasikan ke pakan maggot.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->

                            <div class="faq-item">
                                <h3>Apa itu sampah popok?</h3>
                                <div class="faq-content">
                                    <p>Sampah yang dikategorikan sebagai sampah <strong>POPOK</strong> adalah sampah yang terdiri dari popok bayi atau pembalut wanita yang nantinya akan dipisahkan oleh mesin untuk diambil hidrogel, sebagai bahan campuran untuk kompos tanaman.</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div><!-- End Faq item-->
                        </div>





                    </div><!-- End Faq Column-->

                </div>

            </div>

        </section><!-- /Faq Section -->

        <!-- Team Section -->
        <section id="team" class="team section" style="background: linear-gradient(to top, #daf8f6, white);">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Team</h2>
                <p>Our hard working team</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up">
                <div class="team-slider-wrapper">
                    <div class="team-slider">
                        <!-- Duplicate items for seamless looping -->
                        <div class="team-member">
                            <img src="assets/img/team/1.png" class="img-fluid" alt="">
                        </div>
                        <div class="team-member">
                            <img src="assets/img/team/2.png" class="img-fluid" alt="">
                        </div>
                        <div class="team-member">
                            <img src="assets/img/team/3.png" class="img-fluid" alt="">
                        </div>
                        <div class="team-member">
                            <img src="assets/img/team/4.png" class="img-fluid" alt="">
                        </div>
                        <div class="team-member">
                            <img src="assets/img/team/5.png" class="img-fluid" alt="">
                        </div>
                        <div class="team-member">
                            <img src="assets/img/team/6.png" class="img-fluid" alt="">
                        </div>
                        <div class="team-member">
                            <img src="assets/img/team/7.png" class="img-fluid" alt="">
                        </div>
                        <div class="team-member">
                            <img src="assets/img/team/8.png" class="img-fluid" alt="">
                        </div>
                        <div class="team-member">
                            <img src="assets/img/team/9.png" class="img-fluid" alt="">
                        </div>
                        <div class="team-member">
                            <img src="assets/img/team/10.png" class="img-fluid" alt="">
                        </div>
                        <div class="team-member">
                            <img src="assets/img/team/11.png" class="img-fluid" alt="">
                        </div>
                        <div class="team-member">
                            <img src="assets/img/team/12.png" class="img-fluid" alt="">
                        </div>
                        <div class="team-member">
                            <img src="assets/img/team/13.png" class="img-fluid" alt="">
                        </div>
                        <div class="team-member">
                            <img src="assets/img/team/14.png" class="img-fluid" alt="">
                        </div>
                        <div class="team-member">
                            <img src="assets/img/team/15.png" class="img-fluid" alt="">
                        </div>
                        <div class="team-member">
                            <img src="assets/img/team/16.png" class="img-fluid" alt="">
                        </div>
                        <div class="team-member">
                            <img src="assets/img/team/17.png" class="img-fluid" alt="">
                        </div>
                        <div class="team-member">
                            <img src="assets/img/team/18.png" class="img-fluid" alt="">
                        </div>
                        <div class="team-member">
                            <img src="assets/img/team/19.png" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="quote text-center mt-4" data-aos="fade-up">
                        <p class="font-italic">Kami siap menjadi anak muda yang berguna bagi Indonesia</p>
                    </div>
                </div>
            </div>
        </section><!-- /Team Section -->

        <style>
            .team-slider-wrapper {
                overflow: hidden;
                position: relative;
                width: 100%;
            }

            .team-slider {
                display: flex;
                animation: slide 50s linear infinite;
            }

            .team-member {
                flex: 0 0 auto;
                width: 200px;
                /* Adjust width as needed */
                margin: 10px;
            }

            .team-slider img {
                width: 100%;
                border-radius: 10px;
            }

            /* Styling untuk kutipan */
            .quote {
                margin-top: 20px;
                padding: 20px;
                max-width: 800px;
                /* Sesuaikan dengan lebar maksimum yang diinginkan */
                margin-left: auto;
                margin-right: auto;
                font-size: 1.2em;
                font-weight: 600;
                color: #326893;
                text-align: center;
                position: relative;
                font-style: italic;
            }

            .quote p {
                margin: 0;
                position: relative;
                display: inline-block;
                padding: 0 20px;
            }

            .quote p::before,
            .quote p::after {
                content: '';
                position: absolute;
                font-size: 2em;
                color: #326893;
                font-style: normal;
            }

            .quote p::before {
                content: '“';
                top: -20px;
                left: -20px;
            }

            .quote p::after {
                content: '”';
                bottom: -20px;
                right: -20px;
            }


            @keyframes slide {
                0% {
                    transform: translateX(0);
                }

                100% {
                    transform: translateX(-50%);
                }
            }
        </style>

    </main>

    <footer id="footer" class="footer" style="background: linear-gradient(to bottom, #daf8f6, white);">
        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="<?= base_url('Landing'); ?>" class="d-flex align-items-center">
                        <span class="sitename">GO-SARI ECOLOG</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p><strong>Team Capstone 2</strong></p>
                        <p>Universitas Alma Ata Yogyakarta</p>
                        <p>Jl. Brawijaya No.99, Jadan, Tamantirto, Kec. Kasihan, Kabupaten Bantul, Daerah Istimewa</p>
                        <p>Yogyakarta 55183</p>
                        <p class="mt-3"><strong>Phone:</strong> <span>(0274) 434 2288</span></p>
                        <p><strong>Email:</strong> <span>uaa@almaata.ac.id</span></p>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#hero">Home</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#about">About us</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#statistics">Statistics</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#values">Benefit</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#location">Location</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#faq">FAQ</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#team">Team</a></li>

                    </ul>
                </div>


                <div class="col-lg-4 col-md-12">
                    <h4>Follow Us</h4>
                    <p>Ikuti Media Sosial Kami</p>
                    <div class="social-links d-flex">
                        <a href="http://www.twitter.com/@uaaalmaata"><i class="bi bi-twitter-x"></i></a>
                        <a href="https://www.facebook.com/UniversitasAlmaAtaYogyakarta/"><i class="bi bi-facebook"></i></a>
                        <a href="http://instagram.com/universitas_almaata"><i class="bi bi-instagram"></i></a>
                        <a href="https://www.youtube.com/channel/UCxPQvyN22GKU5xdU-DD4P4w"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">GO-SARI ECOLOG</strong> <span>All Rights Reserved</span></p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/landing/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/landing/php-email-form/validate.js"></script>
    <script src="assets/vendor/landing/aos/aos.js"></script>
    <script src="assets/vendor/landing/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/landing/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/landing/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/landing/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/landing/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const combinedChartCtx = document.getElementById('combinedChart').getContext('2d');
            let combinedChart;

            const sampahMasukData = <?= json_encode($sampah_masuk_data); ?>;
            const sampahTerjualData = <?= json_encode($sampah_terjual_data); ?>;
            const labels = <?= json_encode($labels); ?>;

            function createCombinedChart(chartType) {
                if (combinedChart) {
                    combinedChart.destroy();
                }

                let datasets;
                if (chartType === 'area') {
                    datasets = [{
                        label: 'Sampah Masuk',
                        data: sampahMasukData,
                        borderColor: 'rgba(78, 115, 223, 1)',
                        backgroundColor: 'rgba(78, 115, 223, 0.05)',
                        pointRadius: 3,
                        pointBackgroundColor: 'rgba(78, 115, 223, 1)',
                        pointBorderColor: 'rgba(78, 115, 223, 1)',
                        pointHoverRadius: 3,
                        pointHoverBackgroundColor: 'rgba(78, 115, 223, 1)',
                        pointHoverBorderColor: 'rgba(78, 115, 223, 1)',
                        pointHitRadius: 10,
                        pointBorderWidth: 2,
                        tension: 0.3,
                    }, {
                        label: 'Sampah Terjual',
                        data: sampahTerjualData,
                        borderColor: 'rgba(28, 200, 138, 1)',
                        backgroundColor: 'rgba(28, 200, 138, 0.05)',
                        pointRadius: 3,
                        pointBackgroundColor: 'rgba(28, 200, 138, 1)',
                        pointBorderColor: 'rgba(28, 200, 138, 1)',
                        pointHoverRadius: 3,
                        pointHoverBackgroundColor: 'rgba(28, 200, 138, 1)',
                        pointHoverBorderColor: 'rgba(28, 200, 138, 1)',
                        pointHitRadius: 10,
                        pointBorderWidth: 2,
                        tension: 0.3,
                    }];
                } else if (chartType === 'bar') {
                    datasets = [{
                        label: 'Sampah Masuk',
                        data: sampahMasukData,
                        backgroundColor: 'rgba(78, 115, 223, 1)',
                        borderColor: 'rgba(78, 115, 223, 1)',
                        hoverBackgroundColor: 'rgba(78, 115, 223, 0.9)',
                        hoverBorderColor: 'rgba(78, 115, 223, 1)',
                    }, {
                        label: 'Sampah Terjual',
                        data: sampahTerjualData,
                        backgroundColor: 'rgba(28, 200, 138, 1)',
                        borderColor: 'rgba(28, 200, 138, 1)',
                        hoverBackgroundColor: 'rgba(28, 200, 138, 0.9)',
                        hoverBorderColor: 'rgba(28, 200, 138, 1)',
                    }];
                }

                combinedChart = new Chart(combinedChartCtx, {
                    type: (chartType === 'area') ? 'line' : 'bar',
                    data: {
                        labels: labels,
                        datasets: datasets
                    },
                    options: {
                        maintainAspectRatio: false,
                        scales: {
                            x: {
                                time: {
                                    unit: 'date'
                                },
                                grid: {
                                    display: false,
                                    drawBorder: false
                                },
                                ticks: {
                                    maxTicksLimit: 7
                                }
                            },
                            y: {
                                ticks: {
                                    maxTicksLimit: 5,
                                    padding: 10,
                                    callback: function(value, index, values) {
                                        return new Intl.NumberFormat('id-ID', {
                                            style: 'decimal',
                                            minimumFractionDigits: 2
                                        }).format(value) + ' Kg';
                                    }
                                },
                                grid: {
                                    color: 'rgb(234, 236, 244)',
                                    zeroLineColor: 'rgb(234, 236, 244)',
                                    drawBorder: false,
                                    borderDash: [2],
                                    zeroLineBorderDash: [2]
                                }
                            }
                        },
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    label: function(tooltipItem) {
                                        var value = tooltipItem.raw;
                                        return tooltipItem.dataset.label + ': ' + new Intl.NumberFormat('id-ID', {
                                            style: 'decimal',
                                            minimumFractionDigits: 2
                                        }).format(value) + ' Kg';
                                    }
                                }
                            }
                        },
                        legend: {
                            display: true,
                            position: 'top',
                            align: 'end',
                            labels: {
                                usePointStyle: true
                            }
                        },
                        tooltips: {
                            backgroundColor: 'rgb(255, 255, 255)',
                            bodyColor: '#858796',
                            titleColor: '#6e707e',
                            titleMarginBottom: 10,
                            borderColor: '#dddfeb',
                            borderWidth: 1,
                            xPadding: 15,
                            yPadding: 15,
                            displayColors: false,
                            caretPadding: 10
                        }
                    }
                });
            }

            createCombinedChart('area'); // Default chart type

            const combinedChartTypeSelect = document.getElementById('chartType');
            combinedChartTypeSelect.addEventListener('change', function() {
                const selectedChartType = combinedChartTypeSelect.value;
                createCombinedChart(selectedChartType);
            });

            // Event listener untuk reset chart jika membutuhkan
            window.addEventListener('resize', function() {
                if (combinedChart) {
                    combinedChart.resize();
                }
            });
        });
        document.addEventListener('DOMContentLoaded', (event) => {
            const slider = document.querySelector('.team-slider');
            const teamMembers = document.querySelectorAll('.team-member');
            const totalWidth = Array.from(teamMembers).reduce((acc, member) => acc + member.offsetWidth, 0);
            slider.style.width = `${totalWidth * 2}px`; // Duplicate the width for seamless looping
        });
    </script>



</body>

</html>