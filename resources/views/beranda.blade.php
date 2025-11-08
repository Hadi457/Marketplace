@extends('navbar')
@section('content')
<link rel="stylesheet" href="{{asset('style/home.css')}}">
<div class="jumbotron mt-5">
    <h1 class="display-4">Marketplace Sekolah Digital</h1>
    <p class="lead">Tempat terbaik untuk membeli dan menjual kebutuhan sekolah secara mudah, aman, dan terpercaya.</p>
    <hr class="my-4">
    <p>Lengkapi kebutuhan sekolahmu, dari alat tulis hingga seragam, hanya di Skoola!</p>
    <p class="lead">
        <a class="btn btn-primary btn-lg" href="#" role="button">Mulai Belanja</a>
    </p>
</div>
<section class="container py-5">
    <div class="d-flex align-items-start justify-content-between mb-3">
        <div>
            <h2 class="h3 mb-1">Toko Terbaik</h2>
            <p class="text-muted mb-0">Penjual dengan rating & layanan terbaik—direkomendasikan oleh komunitas Skoola.</p>
        </div>
        <div class="align-self-center">
            <a href="#" class="btn btn-lihat">Lihat Semua</a>
        </div>
    </div>
    <!-- Card -->
    <div class="row">
        <div class="col-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-start mb-2">
                    <div class="bg rounded-3 d-flex align-items-center justify-content-center me-3" style="width:54px;height:54px;border-radius:10px;">
                        <strong class="text-inisial">KT</strong>
                    </div>
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-0">Toko Kreatif</h5>
                        <div class="text-muted small">Tasikmalaya • 1.2k penjualan</div>
                    </div>
                    </div>
        
                    <div class="d-flex align-items-center mb-2">
                        <div class="stars me-2">★★★★★</div>
                        <small class="text-muted">4.9 (2.3k)</small>
                    </div>
        
                    <div class="d-flex align-items-center justify-content-between">
                    <small class="text-muted">
                        <i class="bi bi-person-fill"></i> Haji Nawi
                    </small>
                    <a href="#" class="btn btn-dark">Kunjungi</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-start mb-2">
                    <div class="bg rounded-3 d-flex align-items-center justify-content-center me-3" style="width:54px;height:54px;border-radius:10px;">
                        <strong class="text-inisial">TK</strong>
                    </div>
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-0">Tokoku</h5>
                        <div class="text-muted small">Tasikmalaya • 1.2k penjualan</div>
                    </div>
                    </div>
        
                    <div class="d-flex align-items-center mb-2">
                    <div class="stars me-2">★★★★★</div>
                    <small class="text-muted">4.9 (2.3k)</small>
                    </div>
        
                    <div class="d-flex align-items-center justify-content-between">
                    <small class="text-muted">
                        <i class="bi bi-person-fill"></i> Jack
                    </small>
                    <a href="#" class="btn btn-dark">Kunjungi</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex align-items-start mb-2">
                    <div class="bg rounded-3 d-flex align-items-center justify-content-center me-3" style="width:54px; height:54px; border-radius:10px;">
                        <strong class="text-inisial">TB</strong>
                    </div>
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-0">Toko Buku</h5>
                        <div class="text-muted small">Tasikmalaya • 1.2k penjualan</div>
                    </div>
                    </div>
        
                    <div class="d-flex align-items-center mb-2">
                    <div class="stars me-2">★★★★★</div>
                    <small class="text-muted">4.9 (2.3k)</small>
                    </div>
        
                    <div class="d-flex align-items-center justify-content-between">
                    <small class="text-muted">
                        <i class="bi bi-person-fill"></i> Abeem
                    </small>
                    <a href="#" class="btn btn-dark">Kunjungi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="container py-5">
    <div class="d-flex align-items-start justify-content-between mb-3">
        <div>
            <h2 class="h3 mb-1">Produk Terbaru</h2>
            <p class="text-muted mb-0">Temukan berbagai kebutuhan sekolah terbaru di Skoola.</p>
        </div>
        <div class="align-self-center">
            <a href="#" class="btn btn-lihat">Lihat Semua</a>
        </div>
    </div>
    <div class="row g-3">
        <!-- Produk -->
        <div class="col-6 col-md-3">
            <div class="card h-100 shadow-sm border-0">
                <img src="{{asset('asset/image/SkoolaAssets/2.jpg')}}" class="card-img-top" alt="Pulpen Gel Hitam">
                <div class="card-body">
                    <h6 class="card-title mb-1">Pulpen Gel Hitam</h6>
                    <p class="text-muted small mb-2">Toko Kreatif</p>
                    <strong class="text-dark">Rp5.000</strong>
                </div>
                <div class="d-flex p-2">
                    <a class="btn btn-primary w-100">
                        <i class="bi bi-whatsapp me-2" style="color: #16DB65"></i> Chat Penjual
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="container py-5 text-center">
    <div class="p-5 text-white rounded-4"
        style="background: 
                linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                url({{ asset('asset/image/SkoolaAssets/1.jpg') }}) center/cover no-repeat;">
        <h3 class="fw-semibold mb-2">Gabung bersama Skoola!</h3>
        <p class="mb-4">Buka tokomu dan mulai berjualan kebutuhan pendidikan dengan mudah.</p>
        <a href="/daftar" class="btn btn-daftar fw-semibold px-4">Daftar Sekarang</a>
    </div>
</section>
@endsection