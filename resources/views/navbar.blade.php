<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('asset/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('style/navbar.css') }}">
    <!-- Preconnect biar lebih cepat -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Import font Poppins (semua ketebalan dari 100 sampai 900) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100..900&display=swap" rel="stylesheet">
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
                    <form action="" class="d-flex justify-content-center me-3">
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
                    </form>
                    <div class="d-flex justify-content-center mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Toko</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">Tentang Kami</a>
                        </li>
                    </div>
                </ul>
                <div class="d-flex gap-2">
                    <button class="btn btn-primary">Masuk</button>
                    <button class="btn btn-outline">Daftar</button>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid m-0 p-0">
        @yield('content')
    </div>
</body>
</html>
<script src="{{asset('asset/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
