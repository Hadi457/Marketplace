<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Skoola</title>
        <link rel="stylesheet" href="{{ asset('asset/fontawesome/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('asset/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('style/sidebar.css') }}">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

        <link href="https://cdn.datatables.net/v/dt/dt-2.0.2/datatables.min.css" rel="stylesheet">
        <script src="https://cdn.datatables.net/v/dt/dt-2.0.2/datatables.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
        <script src="https://cdn.datatables.net/responsive/3.0.0/js/dataTables.responsive.js"></script>
        <script src="https://cdn.datatables.net/responsive/3.0.0/js/responsive.bootstrap5.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/responsive/3.0.0/css/responsive.bootstrap5.css" rel="stylesheet">

    </head>
    <body>
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-content">
                <h2 class="logo p-3" href="/">Skoola</h2>
                <hr>
                <a href="/admin/dashboard" class="nav-link active">
                    <i class="bi bi-speedometer me-2"></i> Dashboard
                </a>
                <a href="/admin/user" class="nav-link active">
                    <i class="bi bi-person me-2"></i> User
                </a>
                <a href="/admin/toko" class="nav-link active">
                    <i class="bi bi-shop-window me-2"></i> Toko
                </a>
            </div>
            <div class="logout-btn p-4">
                <hr>
                <a href="/logout"><i class="bi bi-box-arrow-right me-2"></i>keluar</a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="content">
            @yield('content')
        </div>
    </body>
</html>
<script src="{{asset('asset/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
