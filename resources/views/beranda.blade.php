@extends('navbar')
@section('content')
<link rel="stylesheet" href="{{asset('style/home.css')}}">
<section class="container py-5">
    <div class="jumbotron">
        <h1 class="display-4">Marketplace Sekolah Digital</h1>
        <p class="lead">Tempat terbaik untuk membeli dan menjual kebutuhan sekolah secara mudah, aman, dan terpercaya.</p>
        <hr class="my-4">
        <p>Lengkapi kebutuhan sekolahmu, dari alat tulis hingga seragam, hanya di Skoola!</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="/produk" role="button">Mulai Belanja</a>
        </p>
    </div>
    <div class="d-flex align-items-start justify-content-between mb-3 mt-5">
        <div>
            <h2 class="h3 mb-1">Toko Terbaru</h2>
            <p class="text-muted mb-0">
                Jelajahi berbagai toko yang menawarkan kebutuhan sekolah terbaik untukmu.
            </p>
        </div>
        <div class="align-self-center">
            <a href="/toko" class="btn btn-lihat">Lihat Semua</a>
        </div>
    </div>
    <div class="row">
        @foreach ($stores as $item)
            <div class="col-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-start mb-2">
                            <div class="bg rounded-3 d-flex align-items-center justify-content-center me-3" style="width:54px;height:54px;border-radius:10px;">
                                <img src="{{ asset('storage/gambar-toko/' . $item->gambar) }}" style="object-fit: cover;" width="50" height="50" alt="">
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="card-title mb-0">{{$item->nama_toko}}</h5>
                                <small>
                                    <i class="bi bi-geo-alt-fill me-1 text-dark"></i>
                                    {{$item->alamat}}
                                </small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mt-3">
                            <small class="text-muted">
                                <i class="fa-brands fa-whatsapp text-dark me-2"></i>
                                {{$item->kontak_toko}}
                            </small>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <small class="text-muted">
                                <i class="fa-solid fa-user text-dark me-2"></i>
                                {{$item->user->name}}
                            </small>
                            <a href="{{route('toko.detail',Crypt::encrypt($item->id))}}" class="btn btn-dark">Kunjungi</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
<section class="container mt-5">
    <div class="d-flex align-items-start justify-content-between mb-3">
        <div>
            <h2 class="h3 mb-1">Produk Terbaru</h2>
            <p class="text-muted mb-0">Temukan berbagai kebutuhan sekolah terbaru di Skoola.</p>
        </div>
        <div class="align-self-center">
            <a href="/produk" class="btn btn-lihat">Lihat Semua</a>
        </div>
    </div>
    <div class="row g-3">
        @foreach($products as $p)
            <div class="col-6 col-md-3">
                <div class="card h-100 shadow-sm border-0">
                    <a href="{{route('produk.detail',Crypt::encrypt($p->id))}}" class="nav-link">
                        <img src="{{$p->imageProducts->first() ? asset('storage/gambar-produk/' . $p->imageProducts->first()->nama_gambar) : asset('asset/image/SkoolaAssets/no-image.png')}}" class="card-img-top" alt="{{ $p->nama_produk }}" style="object-fit:cover; height:200px;">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title mb-1">{{ Str::limit($p->nama_produk, '50', '....') }}</h5>
                        
                        <p class="text-muted small mb-2">Stok : {{ $p->stok }}</p>
                        <strong class="text-dark">Rp {{ number_format($p->harga, 0, ',', '.') }}</strong>
                    </div>
                    <div class="d-flex p-2">
                        <a href="https://wa.me/{{ $p->store->kontak_toko }}?text=Halo%20saya%20tertarik%20dengan%20produk%20{{ urlencode($p->nama_produk) }}" class="btn btn-primary w-100 me-2">
                            <i class="bi bi-whatsapp me-2" style="color: #16DB65"></i> Chat Penjual
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection