@extends('navbar')
@section('content')
<link rel="stylesheet" href="{{asset('style/produk-detail.css')}}">

{{-- <div class="container py-4">

    <div class="row">

        <!-- Kolom Gambar -->
        <div class="col-lg-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-body">

            <!-- Gambar utama -->
            <div class="mb-3">
                <img src="{{asset('asset/image/SkoolaAssets/1.jpg')}}"
                    class="img-fluid rounded"
                    style="width:100%; object-fit:cover;">
            </div>

            <!-- Thumbnail -->
            <div class="row g-2">
                <div class="col-3 thumb">
                <img src="{{asset('asset/image/SkoolaAssets/1.jpg')}}" class="img-fluid rounded">
                </div>
                <div class="col-3 thumb">
                <img src="{{asset('asset/image/SkoolaAssets/2.jpg')}}" class="img-fluid rounded">
                </div>
                <div class="col-3 thumb">
                <img src="{{asset('asset/image/SkoolaAssets/1.jpg')}}" class="img-fluid rounded">
                </div>
                <div class="col-3 thumb">
                <img src="{{asset('asset/image/SkoolaAssets/1.jpg')}}" class="img-fluid rounded">
                </div>
            </div>

            </div>
        </div>
        </div>

        <!-- Kolom Detail Produk -->
        <div class="col-lg-6 mb-4">
        <div class="card shadow-sm h-100">
            <div class="card-body d-flex flex-column">

            <h3 class="mb-2">Nama Produk Dummy</h3>

            <div class="mb-3">
                <span class="price h4">Rp 150.000</span>
                <span class="badge badge-stock ms-2">Stok: 12</span>
            </div>

            <p class="text-muted mb-3">
                Ini adalah deskripsi dummy untuk produk.
                Jelaskan fitur, bahan, ukuran, atau informasi lain mengenai produk.
            </p>

            <ul class="list-unstyled small text-muted mb-3">
                <li><strong>Kategori:</strong> Elektronik</li>
                <li><strong>Toko:</strong> Toko Sumber Jaya</li>
                <li><strong>Tanggal Upload:</strong> 19 November 2025</li>
                <li><strong>Dibuat:</strong> 2 hari yang lalu</li>
            </ul>

            <div class="mt-auto d-flex gap-2">
                <button class="btn btn-outline-custom">
                    <i class="bi bi-whatsapp me-2" style="color: #16DB65"></i>
                    Chat Penjual
                </button>
                <button class="btn btn-primary-custom ms-auto">Lihat Toko</button>
            </div>

            </div>
        </div>

        </div>
    </div>
</div> --}}
<div class="container py-4">

    <div class="row">

        <!-- Kolom Gambar -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">

                    <div class="mb-3 text-center">
                        <img id="mainImage" src="{{$product->imageProducts->first() ? asset('storage/gambar-toko/' . $product->imageProducts->first()->nama_gambar) : asset('asset/image/SkoolaAssets/1.jpg')}}"
                             class="img-fluid rounded"
                             style="width:100%; max-height:520px; object-fit:cover;">
                    </div>

                    <!-- Thumbnail -->
                    <div class="row g-2">
                        @foreach ($product->imageProducts as $img)
                            <div class="col-3">
                                <img src="{{ asset('storage/gambar-toko/' . $img->nama_gambar) }}"
                                     class="img-fluid rounded thumb-img"
                                     style="height:80px; width:100%; object-fit:cover; cursor:pointer;"
                                     data-src="{{ asset('storage/products/' . $img->nama_gambar) }}"
                                     alt="thumb">
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>

        <!-- Kolom Detail Produk -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body d-flex flex-column">

                    <h3 class="mb-2">{{ $product->nama_produk }}</h3>

                    <div class="mb-3">
                        <span class="price h4">Rp {{ number_format($product->harga,0,',','.') }}</span>
                        <span class="badge bg-secondary ms-2">Stok: {{ $product->stok }}</span>
                    </div>

                    <p class="text-muted mb-3">
                        {!! nl2br(e($product->deskripsi)) !!}
                    </p>

                    <ul class="list-unstyled small text-muted mb-3">
                        <li><strong>Kategori:</strong> {{ $product->category->nama_kategori ?? '—' }}</li>
                        <li><strong>Toko:</strong> {{ $product->store->nama_toko ?? '—' }}</li>
                        <li><strong>Tanggal Upload:</strong> {{ \Carbon\Carbon::parse($product->tanggal_upload)->format('d F Y') }}</li>
                        <li><strong>Dibuat:</strong> {{ $product->created_at->diffForHumans() }}</li>
                    </ul>

                    <div class="mt-auto d-flex gap-2">
                        {{-- ganti nomor dengan data kontak toko kalau ada --}}
                        <a href="https://wa.me/{{ $product->store->kontak ?? '628000000000' }}" target="_blank" class="btn btn-outline-success">
                            <i class="bi bi-whatsapp me-2"></i> Chat Penjual
                        </a>

                        <a href="{{ route('toko.member', $product->store->id ?? 0) }}" class="btn btn-primary ms-auto">Lihat Toko</a>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

{{-- Opsional: script kecil untuk klik thumbnail -> ganti main image --}}
@push('scripts')
<script>
document.addEventListener('click', function(e){
    const t = e.target;
    if(t.classList.contains('thumb-img')){
        const src = t.getAttribute('data-src');
        const main = document.getElementById('mainImage');
        if(main && src) main.src = src;
    }
});
</script>
@endpush
@endsection