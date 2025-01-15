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
                            <a href="/" class="nav-item nav-link ">Home</a>
                            <a href="/#about-anchor" class="nav-item nav-link">Tentang Kami</a>
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
            <div class="row g-4 py-4">
                <!-- Recommendation Card 1 -->

                @foreach($users as $user)
                    <div class="col-12">
                        <div class="card border-0 shadow-sm p-4">
                            <div class="row g-0">
                                <!-- Image Section -->
                                <div class="col-md-4 position-relative" style="max-width: 300px;">
                                    <img src="/storage/{{$user->avatar}}"
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
                                        <a class="card-title text-danger fw-bold mb-3 h4" href="{{route("about", $user)}}">{{$user->nama_toko}}</a>
                                        <p class="card-text text-muted mb-4" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                            {{$user->deskripsi_toko}}
                                        </p>

                                        <!-- Top Menu Section -->
                                        <div class="mb-4">
                                            <h5 class="text-danger fw-bold mb-3">Top Menu</h5>
                                            <div class="d-flex flex-wrap gap-4">
                                                <!-- Menu Item 1 -->

                                                @foreach($user->menus->take(3) as $menu)
                                                    <div class="item-menu text-center">
                                                        <img src="/storage/{{$menu->picture}}"
                                                             class="rounded mb-2"
                                                             style="width: 100px; height: 70px; object-fit: cover;"
                                                             alt="Nasi Tempong Bebek">
                                                        <p class="mb-1 fw-bold">{{$menu->name}}</p>
                                                        <p class="text-danger mb-0">{{formatRupiah($menu->price)}}</p>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>

                                        <!-- Info Section -->
                                        <div class="d-flex flex-wrap gap-3 text-muted">
                                            <p class="m-0">
                                                <span class="fw-bold text-dark">Kisaran Harga:</span> Rp {{$user->kisaran_harga}}
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
                @endforeach

            </div>

            <nav aria-label="..." class="d-flex justify-content-center">
                <ul class="pagination">
                    {{$users->appends(['search' => request()->get('search')])->links()}}
                </ul>
            </nav>

        </div>



        {{--Footer Start--}}
        <!-- Footer -->
        <footer class="text-center text-lg-start bg-body-tertiary text-muted">

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
                                <a href="{{route('home')}}" class="text-reset">Home</a>
                            </p>
                            <p>
                                <a href="https://cateringinaja.my.id/#about-anchor" class="text-reset">Tentang Kami</a>
                            </p>
                            <p>
                                <a href="{{route('find')}}" class="text-reset">Temukan Catering</a>
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
    </body>

</html>
