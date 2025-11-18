@extends('navbar')
@section('content')
<link rel="stylesheet" href="{{asset('style/produk-detail.css')}}">
<div class="container my-5">
    <div class="row">
        <!-- Gambar Produk -->
        <div class="col-md-6">
            <div class="mb-3">
                <img id="main-image" src="{{asset('asset/image/SkoolaAssets/1.jpg')}}" alt="Samsung Galaxy S23 Ultra" class="product-image rounded">
            </div>
            <div class="d-flex gap-2">
                <img src="{{asset('asset/image/SkoolaAssets/1.jpg')}}" alt="Gambar 1" class="thumbnail active" onclick="changeImage(this)">
                <img src="{{asset('asset/image/SkoolaAssets/2.jpg')}}" alt="Gambar 2" class="thumbnail" onclick="changeImage(this)">
                <img src="{{asset('asset/image/SkoolaAssets/4.jpg')}}" alt="Gambar 3" class="thumbnail" onclick="changeImage(this)">
                <img src="{{asset('asset/image/SkoolaAssets/1.jpg')}}" alt="Gambar 4" class="thumbnail" onclick="changeImage(this)">
            </div>
        </div>

        <!-- Informasi Produk -->
        <div class="col-md-6">
            <h1 class="h3">Samsung Galaxy S23 Ultra 256GB Phantom Black</h1>

            <!-- Harga -->
            <div class="mb-3">
                <h2 class="price h4">Rp 15.999.000</h2>
            </div>

            <!-- Stok -->
            <div class="mb-3">
                <span class="text-muted">Stok: 45</span>
            </div>

            <!-- Deskripsi Singkat -->
            <div class="mb-4">
                <h4 class="fw-bold">Deskripsi</h4>
                <p>Samsung Galaxy S23 Ultra lorem50 dengan kamera 200MP, chipset Snapdragon 8 Gen 2, dan baterai 5000mAh. Dilengkapi dengan S-Pen untuk produktivitas maksimal.</p>
            </div>

            <!-- Tombol Aksi -->
            <a href="/produk/detail" class="btn btn-primary w-100 mb-4">
                <i class="bi bi-whatsapp me-2" style="color: #16DB65"></i> Chat Penjual
            </a>

            <!-- Info Toko -->
            <div class="store-info mb-4">
                <h5 class="mb-3">Informasi Toko</h5>
                <div class="d-flex align-items-center mb-2">
                    <img src="{{asset('asset/image/SkoolaAssets/1.jpg')}}" width="80" height="80" alt="Toko" class="rounded-circle me-2">
                    <div class="ms-3">
                        <h6 class="mb-0">Toko Elektronik Maju Jaya</h6>
                        <small class="text-muted">Jakarta, Indonesia</small>
                    </div>
                </div>
                <div class="d-flex gap-3 my-3">
                    <div>
                        <small class="text-muted">Produk</small>
                        <div class="fw-bold">1.2K</div>
                    </div>
                    <div>
                        <small class="text-muted">Bergabung</small>
                        <div class="fw-bold">Mar 2020</div>
                    </div>
                </div>
                <button class="btn btn-outline btn-sm mt-2">Kunjungi Toko</button>
            </div>
        </div>
    </div>
</div>
<script>
    function changeImage(element) {
        // Update gambar utama
        document.getElementById('main-image').src = element.src;
        
        // Update status aktif thumbnail
        const thumbnails = document.querySelectorAll('.thumbnail');
        thumbnails.forEach(thumb => {
            thumb.classList.remove('active');
        });
        element.classList.add('active');
    }
</script>
@endsection