<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sidebar Bootstrap 5</title>
        <link rel="stylesheet" href="{{asset('style/sidebar.css')}}">
        <link rel="stylesheet" href="{{asset('asset/bootstrap/css/bootstrap.min.css')}}">
        <!-- Preconnect biar lebih cepat -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <!-- Import font Poppins (semua ketebalan dari 100 sampai 900) -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100..900&display=swap" rel="stylesheet">
    </head>
    <body>
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-content">
                <h4 class="mb-4">Skoola</h4>
                <a href="#" class="nav-link active">
                    <i class="bi bi-speedometer me-2"></i> Dashboard
                </a>
                <a href="#" class="nav-link active">
                    <i class="bi bi-person me-2"></i> User
                </a>
                <a href="#" class="nav-link active">
                    <i class="bi bi-shop-window me-2"></i> Toko
                </a>
            </div>
            <button class="logout-btn p-4">
                <hr>
                <i class="bi bi-box-arrow-right me-2"></i> Keluar
            </button>
        </div>

        <!-- Main Content -->
        <div class="content">
            @yield('content')
        </div>
    </body>
</html>
<script src="{{asset('asset/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
