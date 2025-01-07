<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>CaterServ - Catering Services Website Template</title>
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
        <style>
            @media (max-width: 576px) {
                .badge {
                    top: 5px; /* Ubah posisi jika diperlukan */
                    left: 5px;
                    font-size: 0.7rem;
                    width: 63px;
                    height: 26px;
                }
            }
            .top-menu {
                margin-top: 20px;
            }

            .top-menu h3 {
                font-size: 18px;
                color: #d32f2f;
            }

            .menu-items {
                display: flex;
                gap: 15px;
            }

            .menu-item {
                text-align: center;
                width: 120px;
            }

            .menu-item img {
                width: 100%;
                height: auto;
                border-radius: 5px;
            }

            .menu-name {
                font-size: 14px;
                font-weight: bold;
                margin: 5px 0;
            }

            .menu-price {
                font-size: 13px;
                color: #555;
            }



        </style>
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
                    <a href="index.blade.php" class="navbar-brand">
                        <h1 class="text-primary fw-bold mb-0"><span><img src="/landingpage/img/logo-only-cateringinaja.png" style="width: 70px"></span> Cateringin<span class="text-dark">Aja</span> </h1>
                    </a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="index.blade.php" class="nav-item nav-link ">Home</a>
                            <a href="about.html" class="nav-item nav-link">Tentang Kami</a>
                            <a href="service.html" class="nav-item nav-link active">Temukan Katering</a>
                        </div>
                        <button class="btn-search btn btn-primary btn-md-square me-4 rounded-circle d-none d-lg-inline-flex" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search"></i></button>
                        <a href="" class="btn btn-primary py-2 px-4 d-none d-xl-inline-block rounded-pill">Login</a>
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



        <div class="container py-2" >
            <div class="row g-4 py-3">
                <div class="col-12 d-flex flex-column align-items-start gap-3">
                    <!-- Bagian Gambar dan Deskripsi -->
                    <div class="d-flex flex-column flex-md-row gap-3 position-relative">
                        <!-- Gambar dengan rating -->
                        <div class="position-relative">
                            <img class="img-fluid img-thumbnail rounded-2"
                                 style="width: 300px; height: 300px; object-fit: cover;"
                                 src="https://img.foodspot.co.id/restaurant//bebekbkb/logo.jpg"
                                 alt="Bebek BKB">
                            <!-- Button Rating -->
                            <span class="badge bg-primary position-absolute m-2"
                                  style="font-size: 0.9rem; padding: 5px 10px; border-radius: 10px; bottom: 20px; right: 0;">
                ⭐ 5.0
            </span>
                        </div>
                        <!-- Deskripsi -->
                        <div style="max-width: 1000px;">
                            <p class="text-danger fw-bold text-decoration-underline" style="font-size: 24px; font-weight: bolder;">Bebek GKB</p>
                            <p style="font-family: 'Calibri Light'; color: #777; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                Berencana menjadikan bebek sebagai lauk utama di acara Anda? Jika iya, BKB bisa jadi pilihan yang tepat. BKB atau Bebek Kepahiang Babase menyediakan sajian bebek khas Bengkulu. Berbeda dari restoran bebek lainnya yang cenderung kering dan krispi, bebek khas BKB sangatlah lembut, empuk, dan juicy. Tidak hanya tekstur, tampilan bebek BKB pun sangat khas, berwarna kehitaman dengan proses memasak hampir 24 jam. Proses memasak yang lama khas daerah Kepahiang ditambah aneka rempah dan bumbu menjadikan rasa bebek BKB gurih dan meresap hingga ke tulang.
                            </p>
                            <div class="top-menu">
                                <p class="text-danger fw-bold">Top Menu</p>
                                <div class="menu-items" style="color: black">
                                    <!-- Menu 1 -->
                                    <div class="menu-item">
                                        <img style="width: 100px; height: 70px; object-fit: cover;" src="https://img.foodspot.co.id/restaurant//bebekbkb/2024/oct/nasi-tempong-bebek-djakarta.jpg" alt="Nasi Tempong Bebek">
                                        <p class="menu-name">Nasi Tempong Bebek</p>
                                        <p class="menu-price">Rp 58.410</p>
                                    </div>
                                    <!-- Menu 2 -->
                                    <div class="menu-item">
                                        <img style="width: 100px; height: 70px; object-fit: cover;" src="https://img.foodspot.co.id/restaurant//bebekbkb/2024/oct/nasi-tempong-bebek-djakarta.jpg" alt="Nasi Tempong Bebek">
                                        <p class="menu-name">Nasi Tempong Ayam</p>
                                        <p class="menu-price">Rp 51.810</p>
                                    </div>
                                    <!-- Menu 3 -->
                                    <div class="menu-item">
                                        <img style="width: 100px; height: 70px; object-fit: cover;" src="https://img.foodspot.co.id/restaurant//bebekbkb/2024/oct/nasi-tempong-bebek-djakarta.jpg" alt="Nasi Tempong Bebek">
                                        <p class="menu-name">Nasi Tempong Ayam Pedas</p>
                                        <p class="menu-price">Rp 51.810</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Bagian Informasi Harga dan Minimum -->
                    <div class="d-flex flex-wrap gap-3 text-black"
                         style="font-family: 'Calibri Light'; color: black">
                        <p class="m-0">
                            <span class="fw-bold text-dark">Kisaran Harga:</span> Rp 4.500 - 230.000
                        </p>
                        <span>|</span>
                        <p class="m-0">
                            <span class="fw-bold text-dark">Minimum:</span> 5 Pax
                        </p>
                        <span>|</span>
                        <p class="m-0">Pesan 1 hari sebelumnya</p>
                    </div>
                </div>
                <hr>

                <div class="col-12 d-flex flex-column align-items-start gap-3">
                    <!-- Bagian Gambar dan Deskripsi -->
                    <div class="d-flex flex-column flex-md-row gap-3 position-relative">
                        <!-- Gambar dengan rating -->
                        <div class="position-relative">
                            <img class="img-fluid img-thumbnail rounded-2"
                                 style="width: 300px; height: 300px; object-fit: cover;"
                                 src="https://img.foodspot.co.id/restaurant//bebekbkb/logo.jpg"
                                 alt="Bebek BKB">
                            <!-- Button Rating -->
                            <span class="badge bg-success position-absolute m-2"
                                  style="font-size: 0.9rem; padding: 5px 10px; border-radius: 10px; bottom: 20px; right: 0;">
                ⭐ 5.0
            </span>
                        </div>
                        <!-- Deskripsi -->
                        <div style="max-width: 1000px;">
                            <p class="text-danger fw-bold text-decoration-underline" style="font-size: 24px; font-weight: bolder;">Bebek GKB</p>
                            <p style="font-family: 'Calibri Light'; color: #777; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                Berencana menjadikan bebek sebagai lauk utama di acara Anda? Jika iya, BKB bisa jadi pilihan yang tepat. BKB atau Bebek Kepahiang Babase menyediakan sajian bebek khas Bengkulu. Berbeda dari restoran bebek lainnya yang cenderung kering dan krispi, bebek khas BKB sangatlah lembut, empuk, dan juicy. Tidak hanya tekstur, tampilan bebek BKB pun sangat khas, berwarna kehitaman dengan proses memasak hampir 24 jam. Proses memasak yang lama khas daerah Kepahiang ditambah aneka rempah dan bumbu menjadikan rasa bebek BKB gurih dan meresap hingga ke tulang.
                            </p>
                            <div class="top-menu">
                                <p class="text-danger fw-bold">Top Menu</p>
                                <div class="menu-items" style="color: black">
                                    <!-- Menu 1 -->
                                    <div class="menu-item">
                                        <img style="width: 100px; height: 70px; object-fit: cover;" src="https://img.foodspot.co.id/restaurant//bebekbkb/2024/oct/nasi-tempong-bebek-djakarta.jpg" alt="Nasi Tempong Bebek">
                                        <p class="menu-name">Nasi Tempong Bebek</p>
                                        <p class="menu-price">Rp 58.410</p>
                                    </div>
                                    <!-- Menu 2 -->
                                    <div class="menu-item">
                                        <img style="width: 100px; height: 70px; object-fit: cover;" src="https://img.foodspot.co.id/restaurant//bebekbkb/2024/oct/nasi-tempong-bebek-djakarta.jpg" alt="Nasi Tempong Bebek">
                                        <p class="menu-name">Nasi Tempong Ayam</p>
                                        <p class="menu-price">Rp 51.810</p>
                                    </div>
                                    <!-- Menu 3 -->
                                    <div class="menu-item">
                                        <img style="width: 100px; height: 70px; object-fit: cover;" src="https://img.foodspot.co.id/restaurant//bebekbkb/2024/oct/nasi-tempong-bebek-djakarta.jpg" alt="Nasi Tempong Bebek">
                                        <p class="menu-name">Nasi Tempong Ayam Pedas</p>
                                        <p class="menu-price">Rp 51.810</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Bagian Informasi Harga dan Minimum -->
                    <div class="d-flex flex-wrap gap-3 text-black"
                         style="font-family: 'Calibri Light'; color: black">
                        <p class="m-0">
                            <span class="fw-bold text-dark">Kisaran Harga:</span> Rp 4.500 - 230.000
                        </p>
                        <span>|</span>
                        <p class="m-0">
                            <span class="fw-bold text-dark">Minimum:</span> 5 Pax
                        </p>
                        <span>|</span>
                        <p class="m-0">Pesan 1 hari sebelumnya</p>
                    </div>
                </div>
                <hr>

                <div class="col-12 d-flex flex-column align-items-start gap-3">
                    <!-- Bagian Gambar dan Deskripsi -->
                    <div class="d-flex flex-column flex-md-row gap-3 position-relative">
                        <!-- Gambar dengan rating -->
                        <div class="position-relative">
                            <img class="img-fluid img-thumbnail rounded-2"
                                 style="width: 300px; height: 300px; object-fit: cover;"
                                 src="https://img.foodspot.co.id/restaurant//bebekbkb/logo.jpg"
                                 alt="Bebek BKB">
                            <!-- Button Rating -->
                            <span class="badge bg-success position-absolute m-2"
                                  style="font-size: 0.9rem; padding: 5px 10px; border-radius: 10px; bottom: 20px; right: 0;">
                ⭐ 5.0
            </span>
                        </div>
                        <!-- Deskripsi -->
                        <div style="max-width: 1000px;">
                            <p class="text-danger fw-bold text-decoration-underline" style="font-size: 24px; font-weight: bolder;">Bebek GKB</p>
                            <p style="font-family: 'Calibri Light'; color: #777; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                Berencana menjadikan bebek sebagai lauk utama di acara Anda? Jika iya, BKB bisa jadi pilihan yang tepat. BKB atau Bebek Kepahiang Babase menyediakan sajian bebek khas Bengkulu. Berbeda dari restoran bebek lainnya yang cenderung kering dan krispi, bebek khas BKB sangatlah lembut, empuk, dan juicy. Tidak hanya tekstur, tampilan bebek BKB pun sangat khas, berwarna kehitaman dengan proses memasak hampir 24 jam. Proses memasak yang lama khas daerah Kepahiang ditambah aneka rempah dan bumbu menjadikan rasa bebek BKB gurih dan meresap hingga ke tulang.
                            </p>
                            <div class="top-menu">
                                <p class="text-danger fw-bold">Top Menu</p>
                                <div class="menu-items" style="color: black">
                                    <!-- Menu 1 -->
                                    <div class="menu-item">
                                        <img style="width: 100px; height: 70px; object-fit: cover;" src="https://img.foodspot.co.id/restaurant//bebekbkb/2024/oct/nasi-tempong-bebek-djakarta.jpg" alt="Nasi Tempong Bebek">
                                        <p class="menu-name">Nasi Tempong Bebek</p>
                                        <p class="menu-price">Rp 58.410</p>
                                    </div>
                                    <!-- Menu 2 -->
                                    <div class="menu-item">
                                        <img style="width: 100px; height: 70px; object-fit: cover;" src="https://img.foodspot.co.id/restaurant//bebekbkb/2024/oct/nasi-tempong-bebek-djakarta.jpg" alt="Nasi Tempong Bebek">
                                        <p class="menu-name">Nasi Tempong Ayam</p>
                                        <p class="menu-price">Rp 51.810</p>
                                    </div>
                                    <!-- Menu 3 -->
                                    <div class="menu-item">
                                        <img style="width: 100px; height: 70px; object-fit: cover;" src="https://img.foodspot.co.id/restaurant//bebekbkb/2024/oct/nasi-tempong-bebek-djakarta.jpg" alt="Nasi Tempong Bebek">
                                        <p class="menu-name">Nasi Tempong Ayam Pedas</p>
                                        <p class="menu-price">Rp 51.810</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Bagian Informasi Harga dan Minimum -->
                    <div class="d-flex flex-wrap gap-3 text-black"
                         style="font-family: 'Calibri Light'; color: black">
                        <p class="m-0">
                            <span class="fw-bold text-dark">Kisaran Harga:</span> Rp 4.500 - 230.000
                        </p>
                        <span>|</span>
                        <p class="m-0">
                            <span class="fw-bold text-dark">Minimum:</span> 5 Pax
                        </p>
                        <span>|</span>
                        <p class="m-0">Pesan 1 hari sebelumnya</p>
                    </div>
                </div>
                <hr>


            </div>

        </div>



        <!-- Copyright Start -->
        <div class="container-fluid copyright bg-dark py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>CateringinAJa</a>, All right reserved.</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->


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
    </body>

</html>
