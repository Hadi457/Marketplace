@extends('navbar')
@section('content')
<link rel="stylesheet" href="{{asset('style/produk-detail.css')}}">
<div class="container py-4">
    <div class="d-flex align-items-center mb-4 mt-4">
        <a href="{{ url()->previous() }}" class="btn btn-light me-3">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <h2 class="mb-0">Detail Produk</h2>
    </div>
    <div class="row">
        <!-- Kolom Gambar -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="mb-3 text-center">
                        <img id="mainImage" src="{{$product->imageProducts->first() ? asset('storage/gambar-produk/' . $product->imageProducts->first()->nama_gambar) : asset('asset/image/SkoolaAssets/no-image.png')}}"
                            class="img-fluid rounded"
                            style="width:100%; max-height:520px; object-fit:cover;">
                    </div>
                    <!-- Thumbnail -->
                    <div class="row g-2">
                        @foreach ($product->imageProducts->skip(1) as $img)
                            <div class="col-3">
                                <img src="{{ asset('storage/gambar-produk/' . $img->nama_gambar) }}"
                                    class="img-fluid rounded thumb-img"
                                    style="height:80px; width:100%; object-fit:cover; cursor:pointer;"
                                    data-src="{{ asset('storage/gambar-produk/' . $img->nama_gambar) }}" alt="thumb">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm h-100 border-0">
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
                        <a href="https://wa.me/{{ $product->store->kontak_toko }}?text=Halo%20saya%20tertarik%20dengan%20produk%20{{ urlencode($product->nama_produk) }}" target="_blank" class="btn btn-outline-success">
                            <i class="bi bi-whatsapp me-2"></i> Chat Penjual
                        </a>
                        <a href="{{ route('toko.detail', Crypt::encrypt($product->store->id)) }}" class="btn btn-primary ms-auto">Lihat Toko</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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