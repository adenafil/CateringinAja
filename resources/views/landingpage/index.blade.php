<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Cateringin Aja - Mau Bikin Acara Spesial?
            CateringinAja Lahh</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playball&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
<!--        <link href="lib/animate/animate.min.css" rel="stylesheet">-->
        <link href="/landingpage/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="/landingpage/lib/owlcarousel/owl.carousel.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="/landingpage/css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="/landingpage/css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar start -->
        <div class="container-fluid nav-bar">
            <div class="container">
                <nav class="navbar navbar-light navbar-expand-lg py-4">
                    <a href="index.html" class="navbar-brand">
                        <h1 class="text-primary fw-bold mb-0"><span><img src="/landingpage/img/logo-only-cateringinaja.png" style="width: 70px"></span> Cateringin<span class="text-dark">Aja</span> </h1>
                    </a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="/" class="nav-item nav-link active">Home</a>
                            <a href="#about-anchor" class="nav-item nav-link">Tentang Kami</a>
                            <a href="{{route('find')}}" class="nav-item nav-link">Temukan Katering</a>
                        </div>
                        <button class="btn-search btn btn-primary btn-md-square me-4 rounded-circle" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search"></i></button>

                        <!-- Login Dropdown -->
                        <div class="nav-item dropdown login-dropdown">
                            <button class="btn btn-primary rounded-pill px-4 py-2 me-2 mt-2 mt-lg-0" style="min-width: 96px;"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                Login
                            </button>
                            <div class="dropdown-menu login-options">
                                <a class="dropdown-item fw-bold" href="#">Penyedia Catering</a>
                                <a class="dropdown-item fw-bold" href="#">Pembeli</a>
                            </div>
                        </div>
                        <a href="" class="btn btn-outline-primary py-2 px-4 rounded-pill mt-2 mt-lg-0" style="min-width: 96px;">Daftar</a>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->


        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control bg-transparent p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->


        <!-- Hero Start -->
        <div class="container-fluid bg-light py-6 my-6 mt-0">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-7 col-md-12">
                        <small class="d-inline-block fw-bold text-dark  bg-light border border-primary rounded-pill px-4 py-1 mb-4 animated bounceInDown">Selamat Datang di CateringinAja</small>
                        <h1 class="display-1 mb-4 animated bounceInDown">Mau Bikin Acara Spesial ? <span class="text-primary">Cateringin</span>Aja Lahh</h1>
                        <a href="{{route('find')}}" class="btn btn-primary border-0 rounded-pill py-3 px-4 px-md-5 me-4 animated bounceInLeft">Temukan Katering</a>
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <img src="/landingpage/img/hero.png" class="img-fluid rounded animated zoomIn" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->


        <!-- About Satrt -->
        <div class="container-fluid py-6">
            <div class="container" id="about-anchor">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-5 wow bounceInUp" data-wow-delay="0.1s">
                        <img src="/landingpage/img/about.jpg" class="img-fluid rounded" alt="">
                    </div>
                    <div class="col-lg-7 wow bounceInUp" data-wow-delay="0.3s">
                        <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Tentang Kami</small>
                        <h1 class="display-5 mb-4">Dipercaya Lebih dari 99+ Klien</h1>
                        <p class="mb-4">Kami hadir untuk memberikan layanan terbaik bagi Anda. Dengan pengalaman bertahun-tahun, kami selalu mengutamakan kepuasan pelanggan dan memberikan solusi yang tepat untuk kebutuhan Anda.
                        </p>
                        <div class="row g-4 text-dark mb-5">
                            <div class="col-sm-6">
                                <i class="fas fa-share text-primary me-2"></i>Delivery Makanan Segar dan Cepat
                            </div>
                            <div class="col-sm-6">
                                <i class="fas fa-share text-primary me-2"></i>Opsi Kustomisasi yang Mudah
                            </div>
                            <div class="col-sm-6">
                                <i class="fas fa-share text-primary me-2"></i>Dukungan 24/7
                            </div>
                            <div class="col-sm-6">
                                <i class="fas fa-share text-primary me-2"></i>Penawaran Lezat Untuk Makanan Lezat
                            </div>
                        </div>
                        <a href="{{route('find')}}" class="btn btn-primary py-3 px-5 rounded-pill">Temukan Katering<i class="fas fa-arrow-right ps-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Fact Start-->
        <div class="container-fluid faqt py-6">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-7">
                       <div class="row g-4">
                            <div class="col-sm-4 wow bounceInUp" data-wow-delay="0.3s">
                                <div class="faqt-item bg-primary rounded p-4 text-center">
                                    <i class="fas fa-users fa-4x mb-4 text-white"></i>
                                    <h1 class="display-4 fw-bold" data-toggle="counter-up">689</h1>
                                    <p class="text-dark text-uppercase fw-bold mb-0">Happy Customers</p>
                                </div>
                            </div>
                            <div class="col-sm-4 wow bounceInUp" data-wow-delay="0.5s">
                                <div class="faqt-item bg-primary rounded p-4 text-center">
                                    <i class="fas fa-users-cog fa-4x mb-4 text-white"></i>
                                    <h1 class="display-4 fw-bold" data-toggle="counter-up">107</h1>
                                    <p class="text-dark text-uppercase fw-bold mb-0">Expert Chefs</p>
                                </div>
                            </div>
                            <div class="col-sm-4 wow bounceInUp" data-wow-delay="0.7s">
                                <div class="faqt-item bg-primary rounded p-4 text-center">
                                    <i class="fas fa-check fa-4x mb-4 text-white"></i>
                                    <h1 class="display-4 fw-bold" data-toggle="counter-up">253</h1>
                                    <p class="text-dark text-uppercase fw-bold mb-0">Events Complete</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 wow bounceInUp" data-wow-delay="0.1s">
                        <div class="video">
                            <button type="button" class="btn btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Video -->
        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- 16:9 aspect ratio -->
                        <div class="ratio ratio-16x9">
                            <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                                allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fact End -->


        <!-- Service Start -->
        <div class="container-fluid service py-6">
            <div class="container">
                <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
                    <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Layanan Kami</small>
                    <h1 class="display-5 mb-5">Apa Yang Kami Tawarkan</h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.1s">
                        <div class="service-card position-relative rounded overflow-hidden">
                            <img src="/landingpage/img/wedding-catering.jpg" class="w-100 h-100 object-fit-cover" alt="Layanan Pernikahan">
                            <div class="service-overlay position-absolute w-100 h-100 d-flex flex-column justify-content-end p-4">
                                <h3 class="text-white mb-2">Layanan Pernikahan</h3>
                                <p class="text-white mb-3">Bersama kami, wujudkan momen spesial pernikahan Anda dengan layanan profesional dan penuh cinta.</p>
                                <a href="#" class="btn btn-primary px-4 py-2 rounded-pill">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.3s">
                        <div class="service-card position-relative rounded overflow-hidden">
                            <img src="/landingpage/img/corporate-catering.jpg" class="w-100 h-100 object-fit-cover" alt="Catering Perusahaan">
                            <div class="service-overlay position-absolute w-100 h-100 d-flex flex-column justify-content-end p-4">
                                <h3 class="text-white mb-2">Catering Perusahaan</h3>
                                <p class="text-white mb-3">Nikmati menu istimewa untuk setiap acara perusahaan Anda, dirancang untuk memanjakan setiap selera.</p>
                                <a href="#" class="btn btn-primary px-4 py-2 rounded-pill">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.5s">
                        <div class="service-card position-relative rounded overflow-hidden">
                            <img src="/landingpage/img/home-delivery.jpg" class="w-100 h-100 object-fit-cover" alt="Pengiriman ke Rumah">
                            <div class="service-overlay position-absolute w-100 h-100 d-flex flex-column justify-content-end p-4">
                                <h3 class="text-white mb-2">Pengiriman ke Rumah</h3>
                                <p class="text-white mb-3">Hidangan lezat sampai di pintu rumah Anda, praktis tanpa repot, untuk setiap kesempatan.</p>
                                <a href="#" class="btn btn-primary px-4 py-2 rounded-pill">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.7s">
                        <div class="service-card position-relative rounded overflow-hidden">
                            <img src="/landingpage/img/buffet-catering.jpg" class="w-100 h-100 object-fit-cover" alt="Catering Prasmanan">
                            <div class="service-overlay position-absolute w-100 h-100 d-flex flex-column justify-content-end p-4">
                                <h3 class="text-white mb-2">Catering Prasmanan</h3>
                                <p class="text-white mb-3">Sajikan pengalaman kuliner tak terlupakan dengan layanan prasmanan yang elegan dan berkelas.</p>
                                <a href="#" class="btn btn-primary px-4 py-2 rounded-pill">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rekomendasi Catering Section -->
        <div class="container py-4 mb-4">
            <div class="text-center mb-4">
                <h1 class="display-5 mb-5">Rekomendasi<br>Catering Populer Kami</h1>
            </div>

            <div class="row g-4">
                <!-- Recommendation Card 1 -->
                <div class="col-12">
                    <div class="card border-0 shadow-sm p-4">
                        <div class="row g-0">
                            <!-- Image Section -->
                            <div class="col-md-4 position-relative" style="max-width: 300px;">
                                <img src="https://foryourplate.id/wp-content/uploads/2024/03/Thumbnail-Bebek-Carok.-foryourplate.id_Leqsi-Aprilia-2048x1536.jpg"
                                     class="img-fluid rounded h-100 w-100"
                                     style="object-fit: cover;"
                                     alt="Bebek Carok">
                                <span class="position-absolute bottom-0 end-0 m-3 badge bg-white text-dark">
                            ⭐ 5.0
                        </span>
                            </div>

                            <!-- Content Section -->
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h4 class="card-title text-danger fw-bold mb-3">Bebek Carok</h4>
                                    <p class="card-text text-muted mb-4" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                        Berencana menjadikan bebek sebagai lauk utama di acara Anda? Bebek Carok hadir dengan cita rasa autentik yang khas. Dimasak dengan resep turun-temurun dan bumbu pilihan, setiap gigitan menjanjikan kelezatan yang tak terlupakan. Daging bebek yang empuk dan bumbu yang meresap hingga ke tulang menjadikan Bebek Carok pilihan sempurna untuk berbagai acara.
                                    </p>

                                    <!-- Top Menu Section -->
                                    <div class="mb-4">
                                        <h5 class="text-danger fw-bold mb-3">Top Menu</h5>
                                        <div class="d-flex flex-wrap gap-4">
                                            <!-- Menu Item 1 -->
                                            <div class="item-menu text-center">
                                                <img src="https://bacaini.id/wp-content/uploads/2023/09/bebek-carok.jpg"
                                                     class="rounded mb-2"
                                                     style="width: 100px; height: 70px; object-fit: cover;"
                                                     alt="Nasi Tempong Bebek">
                                                <p class="mb-1 fw-bold">Bebek Carok Jumbo Hitam</p>
                                                <p class="text-danger mb-0">Rp 58.410</p>
                                            </div>
                                            <!-- Menu Item 2 -->
                                            <div class="item-menu text-center">
                                                <img src="https://bacaini.id/wp-content/uploads/2023/09/bebek-carok.jpg"
                                                     class="rounded mb-2"
                                                     style="width: 100px; height: 70px; object-fit: cover;"
                                                     alt="Nasi Tempong Bebek">
                                                <p class="mb-1 fw-bold">Bebek Carok Jumbo Hitam</p>
                                                <p class="text-danger mb-0">Rp 58.410</p>
                                            </div>
                                            <!-- Menu Item 3 -->
                                            <div class="item-menu text-center">
                                                <img src="https://bacaini.id/wp-content/uploads/2023/09/bebek-carok.jpg"
                                                     class="rounded mb-2"
                                                     style="width: 100px; height: 70px; object-fit: cover;"
                                                     alt="Nasi Tempong Bebek">
                                                <p class="mb-1 fw-bold">Bebek Carok Jumbo Hitam</p>
                                                <p class="text-danger mb-0">Rp 58.410</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Info Section -->
                                    <div class="d-flex flex-wrap gap-3 text-muted">
                                        <p class="m-0">
                                            <span class="fw-bold text-dark">Kisaran Harga:</span> Rp 4.500 - 230.000
                                        </p>
                                        <span class="text-muted">|</span>
                                        <p class="m-0">
                                            <span class="fw-bold text-dark">Minimum:</span> 5 Pax
                                        </p>
                                        <span class="text-muted">|</span>
                                        <p class="m-0">Pesan 1 hari sebelumnya</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recommendation Card 2 -->
                <div class="col-12">
                    <div class="card border-0 shadow-sm p-4">
                        <div class="row g-0">
                            <!-- Image Section -->
                            <div class="col-md-4 position-relative" style="max-width: 300px;">
                                <img src="https://foryourplate.id/wp-content/uploads/2024/03/Thumbnail-Bebek-Carok.-foryourplate.id_Leqsi-Aprilia-2048x1536.jpg"
                                     class="img-fluid rounded h-100 w-100"
                                     style="object-fit: cover;"
                                     alt="Bebek Carok">
                                <span class="position-absolute bottom-0 end-0 m-3 badge bg-white text-dark">
                            ⭐ 5.0
                        </span>
                            </div>

                            <!-- Content Section -->
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h4 class="card-title text-danger fw-bold mb-3">Bebek Carok</h4>
                                    <p class="card-text text-muted mb-4" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                        Berencana menjadikan bebek sebagai lauk utama di acara Anda? Bebek Carok hadir dengan cita rasa autentik yang khas. Dimasak dengan resep turun-temurun dan bumbu pilihan, setiap gigitan menjanjikan kelezatan yang tak terlupakan. Daging bebek yang empuk dan bumbu yang meresap hingga ke tulang menjadikan Bebek Carok pilihan sempurna untuk berbagai acara.
                                    </p>

                                    <!-- Top Menu Section -->
                                    <div class="mb-4">
                                        <h5 class="text-danger fw-bold mb-3">Top Menu</h5>
                                        <div class="d-flex flex-wrap gap-4">
                                            <!-- Menu Item 1 -->
                                            <div class="item-menu text-center">
                                                <img src="https://bacaini.id/wp-content/uploads/2023/09/bebek-carok.jpg"
                                                     class="rounded mb-2"
                                                     style="width: 100px; height: 70px; object-fit: cover;"
                                                     alt="Nasi Tempong Bebek">
                                                <p class="mb-1 fw-bold">Bebek Carok Jumbo Hitam</p>
                                                <p class="text-danger mb-0">Rp 58.410</p>
                                            </div>
                                            <!-- Menu Item 2 -->
                                            <div class="item-menu text-center">
                                                <img src="https://bacaini.id/wp-content/uploads/2023/09/bebek-carok.jpg"
                                                     class="rounded mb-2"
                                                     style="width: 100px; height: 70px; object-fit: cover;"
                                                     alt="Nasi Tempong Bebek">
                                                <p class="mb-1 fw-bold">Bebek Carok Jumbo Hitam</p>
                                                <p class="text-danger mb-0">Rp 58.410</p>
                                            </div>
                                            <!-- Menu Item 3 -->
                                            <div class="item-menu text-center">
                                                <img src="https://bacaini.id/wp-content/uploads/2023/09/bebek-carok.jpg"
                                                     class="rounded mb-2"
                                                     style="width: 100px; height: 70px; object-fit: cover;"
                                                     alt="Nasi Tempong Bebek">
                                                <p class="mb-1 fw-bold">Bebek Carok Jumbo Hitam</p>
                                                <p class="text-danger mb-0">Rp 58.410</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Info Section -->
                                    <div class="d-flex flex-wrap gap-3 text-muted">
                                        <p class="m-0">
                                            <span class="fw-bold text-dark">Kisaran Harga:</span> Rp 4.500 - 230.000
                                        </p>
                                        <span class="text-muted">|</span>
                                        <p class="m-0">
                                            <span class="fw-bold text-dark">Minimum:</span> 5 Pax
                                        </p>
                                        <span class="text-muted">|</span>
                                        <p class="m-0">Pesan 1 hari sebelumnya</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recommendation Card 2 -->
                <div class="col-12">
                    <div class="card border-0 shadow-sm p-4">
                        <div class="row g-0">
                            <!-- Image Section -->
                            <div class="col-md-4 position-relative" style="max-width: 300px;">
                                <img src="https://foryourplate.id/wp-content/uploads/2024/03/Thumbnail-Bebek-Carok.-foryourplate.id_Leqsi-Aprilia-2048x1536.jpg"
                                     class="img-fluid rounded h-100 w-100"
                                     style="object-fit: cover;"
                                     alt="Bebek Carok">
                                <span class="position-absolute bottom-0 end-0 m-3 badge bg-white text-dark">
                            ⭐ 5.0
                        </span>
                            </div>

                            <!-- Content Section -->
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h4 class="card-title text-danger fw-bold mb-3">Bebek Carok</h4>
                                    <p class="card-text text-muted mb-4" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                        Berencana menjadikan bebek sebagai lauk utama di acara Anda? Bebek Carok hadir dengan cita rasa autentik yang khas. Dimasak dengan resep turun-temurun dan bumbu pilihan, setiap gigitan menjanjikan kelezatan yang tak terlupakan. Daging bebek yang empuk dan bumbu yang meresap hingga ke tulang menjadikan Bebek Carok pilihan sempurna untuk berbagai acara.
                                    </p>

                                    <!-- Top Menu Section -->
                                    <div class="mb-4">
                                        <h5 class="text-danger fw-bold mb-3">Top Menu</h5>
                                        <div class="d-flex flex-wrap gap-4">
                                            <!-- Menu Item 1 -->
                                            <div class="item-menu text-center">
                                                <img src="https://bacaini.id/wp-content/uploads/2023/09/bebek-carok.jpg"
                                                     class="rounded mb-2"
                                                     style="width: 100px; height: 70px; object-fit: cover;"
                                                     alt="Nasi Tempong Bebek">
                                                <p class="mb-1 fw-bold">Bebek Carok Jumbo Hitam</p>
                                                <p class="text-danger mb-0">Rp 58.410</p>
                                            </div>
                                            <!-- Menu Item 2 -->
                                            <div class="item-menu text-center">
                                                <img src="https://bacaini.id/wp-content/uploads/2023/09/bebek-carok.jpg"
                                                     class="rounded mb-2"
                                                     style="width: 100px; height: 70px; object-fit: cover;"
                                                     alt="Nasi Tempong Bebek">
                                                <p class="mb-1 fw-bold">Bebek Carok Jumbo Hitam</p>
                                                <p class="text-danger mb-0">Rp 58.410</p>
                                            </div>
                                            <!-- Menu Item 3 -->
                                            <div class="item-menu text-center">
                                                <img src="https://bacaini.id/wp-content/uploads/2023/09/bebek-carok.jpg"
                                                     class="rounded mb-2"
                                                     style="width: 100px; height: 70px; object-fit: cover;"
                                                     alt="Nasi Tempong Bebek">
                                                <p class="mb-1 fw-bold">Bebek Carok Jumbo Hitam</p>
                                                <p class="text-danger mb-0">Rp 58.410</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Info Section -->
                                    <div class="d-flex flex-wrap gap-3 text-muted">
                                        <p class="m-0">
                                            <span class="fw-bold text-dark">Kisaran Harga:</span> Rp 4.500 - 230.000
                                        </p>
                                        <span class="text-muted">|</span>
                                        <p class="m-0">
                                            <span class="fw-bold text-dark">Minimum:</span> 5 Pax
                                        </p>
                                        <span class="text-muted">|</span>
                                        <p class="m-0">Pesan 1 hari sebelumnya</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<!--        &lt;!&ndash; Footer Start &ndash;&gt;-->
<!--        <div class="container-fluid footer py-6 my-6 mb-0 bg-light wow bounceInUp" data-wow-delay="0.1s">-->
<!--            <div class="container">-->
<!--                <div class="row">-->
<!--                    <div class="col-lg-3 col-md-6">-->
<!--                        <div class="footer-item">-->
<!--                            <h1 class="text-primary"><span><img src="img/logo-only-cateringinaja.png" style="width: 70px"></span> Cateringin<span class="text-dark">Aja</span></h1>-->
<!--                            <p class="lh-lg mb-4">Cateringin Aja adalah platform online yang mempermudah Anda menemukan layanan katering terbaik sesuai kebutuhan acara Anda. Dari pesta kecil, acara keluarga, hingga pernikahan megah, semuanya bisa Anda temukan di satu tempat!-->
<!--                            </p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-lg-3 col-md-6" style="margin-left: 600px">-->
<!--                        <div class="footer-item">-->
<!--                            <h4 class="mb-4">Contact Us</h4>-->
<!--                            <div class="d-flex flex-column align-items-start">-->
<!--                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i> 123 Street, New York, USA</p>-->
<!--                                <p><i class="fa fa-phone-alt text-primary me-2"></i> (+012) 3456 7890 123</p>-->
<!--                                <p><i class="fas fa-envelope text-primary me-2"></i> info@example.com</p>-->
<!--                                <p><i class="fa fa-clock text-primary me-2"></i> 26/7 Hours Service</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        &lt;!&ndash; Footer End &ndash;&gt;-->


        {{--Footer Start--}}
        <!-- Footer -->
        <footer class="text-center text-lg-start bg-body-tertiary text-muted" style="margin-top: 132px;">

            <section class="">
                <!-- Section: Social media -->
                <section class="container d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                    <!-- Left -->
                    <div class="me-5 d-none d-lg-block">
                        <span>Pantau terus social media kami:</span>
                    </div>
                    <!-- Left -->

                    <!-- Right -->
                    <div>
                        <a href="" class="me-4 text-reset">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="" class="me-4 text-reset">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="" class="me-4 text-reset">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="" class="me-4 text-reset">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                    <!-- Right -->
                </section>
                <!-- Section: Social media -->
            </section>

            <!-- Section: Links  -->
            <section class="">
                <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <h2 class="text-primary fw-bold mb-0"><span><img src="/landingpage/img/logo-only-cateringinaja.png" style="width: 70px"></span> Cateringin<span class="text-dark">Aja</span> </h2>
                            <p>
                                Catering Nikmat, Harga Bersahabat – Cuma di CateringinAja!
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Quick Links
                            </h6>
                            <p>
                                <a href="#!" class="text-reset">Home</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Tentang Kami</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Temukan Catering</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                            <p><i class="fas fa-home me-3"></i> Gresik, Jawa Timur, Indonesia</p>
                            <p>
                                <i class="fas fa-envelope me-3"></i>
                                cateringinaja@gmail.com
                            </p>
                            <p><i class="fas fa-phone me-3"></i> +6281236397074</p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->

            <!-- Copyright -->
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                © 2025 All right reserved -
                <a class="text-reset fw-bold" href="/">CateringinAja</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
        {{--Footer End--}}


        <!-- Back to Top -->
        <a href="#" class="btn btn-md-square btn-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="/landingpage/lib/wow/wow.min.js"></script>
        <script src="/landingpage/lib/easing/easing.min.js"></script>
        <script src="/landingpage/lib/waypoints/waypoints.min.js"></script>
        <script src="/landingpage/lib/counterup/counterup.min.js"></script>
        <script src="/landingpage/lib/lightbox/js/lightbox.min.js"></script>
        <script src="/landingpage/lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Template Javascript -->
        <script src="/landingpage/js/main.js"></script>
        <script type="javascript">
            // Initialize Bootstrap tooltips and popovers if needed
            document.addEventListener('DOMContentLoaded', function() {
                var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
                var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
                    return new bootstrap.Dropdown(dropdownToggleEl)
                })
            });
        </script>
    </body>
</html>
