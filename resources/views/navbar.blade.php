<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('asset/fontawesome/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('asset/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('style/navbar.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

        
        <title>Skoola</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
            <div class="container py-3">
                <h2 class="logo" href="/">Skoola</h2>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="ms-3 collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        {{-- <form action="" class="d-flex justify-content-center me-3">
                            <div style="position: relative; width: 500px;">
                                <input
                                class="form-control"
                                type="search"
                                placeholder="Search"
                                aria-label="Search"
                                onfocus="this.style.outline='none'; this.style.boxShadow='none';"
                                style="padding-right: 40px; border-color: #999; background-color: #f2f2f2; padding: 10px 45px 10px 15px; border-radius: 25px;"
                                >
                                <i class="fa-solid fa-magnifying-glass"
                                style="
                                    position: absolute;
                                    right: 13px;
                                    top: 50%;
                                    transform: translateY(-50%);
                                    color: gray;
                                    cursor: pointer;
                                "></i>
                            </div>
                        </form> --}}
                        <div class="d-flex justify-content-center mx-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/produk">Produk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/about">Tentang Kami</a>
                            </li>
                        </div>
                    </ul>
                    @if (Auth::check())
                        <div class="dropdown">
                            <button class="btn d-flex align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span>{{Auth::user()->name}}</span>
                                <i class="bi bi-person-circle fs-3 ms-3"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a href="/toko/toko-member" class="dropdown-item">Toko</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            </ul>
                        </div>
                    @else
                        <div class="d-flex gap-2">
                            <a href="/login" class="btn btn-primary">Masuk</a>
                            <a href="/register" class="btn btn-outline">Daftar</a>
                        </div>
                    @endif
                </div>
            </div>
        </nav>
        <div class="container-fluid m-0 p-0 min-vh-100">
            @yield('content')
        </div>
        <footer class="mt-5 border-top py-4">
            <div class="container">
                <div class="row gy-3">
                    <div class="col-md-4">
                        <h5 class="fw-bold">Skoola</h5>
                        <p class="text-muted mb-0">Marketplace Sekolah Digital untuk memenuhi kebutuhan pendidikan dengan mudah, aman, dan terpercaya.</p>
                    </div>
                    <div class="col-md-2">
                        <h6 class="fw-semibold mb-3">Navigasi</h6>
                        <ul class="list-unstyled text-muted">
                            <li><a href="#" class="text-decoration-none text-muted">Beranda</a></li>
                            <li><a href="#" class="text-decoration-none text-muted">Produk</a></li>
                            <li><a href="#" class="text-decoration-none text-muted">Toko</a></li>
                            <li><a href="#" class="text-decoration-none text-muted">Tentang Kami</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h6 class="fw-semibold mb-3">Kategori Populer</h6>
                        <ul class="list-unstyled text-muted">
                            <li><a href="#" class="text-decoration-none text-muted">Alat Tulis</a></li>
                            <li><a href="#" class="text-decoration-none text-muted">Seragam Sekolah</a></li>
                            <li><a href="#" class="text-decoration-none text-muted">Perlengkapan Kelas</a></li>
                            <li><a href="#" class="text-decoration-none text-muted">Buku Pelajaran</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h6 class="fw-semibold mb-3">Hubungi Kami</h6>
                        <p class="text-muted mb-1"><i class="bi bi-envelope me-2"></i>support@skoola.id</p>
                        <p class="text-muted mb-1"><i class="bi bi-telephone me-2"></i>+62 812 3456 7890</p>
                        <div class="mt-2">
                            <a href="#" class="text-dark me-3"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="text-dark me-3"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="text-dark"><i class="bi bi-twitter"></i></a>
                        </div>
                    </div>
                </div>
                <hr class="my-4">
                <div class="text-center text-muted small">
                © 2025 <strong>Skoola</strong>
                </div>
            </div>
        </footer>
    </body>
</html>
<script src="{{asset('asset/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
