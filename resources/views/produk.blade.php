@extends('navbar')
@section('content')
<div class="container mt-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Semua Produk</h2>
        <p class="text-muted">Temukan berbagai kebutuhan sekolah dari penjual terpercaya di Skoola</p>
    </div>
</div>

<div class="container">
    <div class="row">
        <!-- NAV PILLS KATEGORI -->
        <div class="col-md-3 mb-4">
            <div class="card border-0 shadow-sm p-3">
                <h6 class="fw-bold mb-3">Filter Kategori</h6>

                <ul class="nav nav-pills flex-column">
                    @foreach ($category as $key => $item)
                        <li class="nav-item">
                            <a class="nav-link {{ $key == 0 ? 'active' : '' }}"
                               data-bs-toggle="pill"
                               href="#kategori{{ $item->id }}">
                                {{ $item->nama_kategori ?? $item->name ?? 'Kategori' }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- TAB CONTENT PRODUK -->
        <div class="col-md-9">
            <div class="tab-content">
                @foreach ($category as $key => $item_category)
                    <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}"
                         id="kategori{{ $item_category->id }}">
                        <div class="row g-4">
                            @forelse ($item_category->products as $p)
                                <div class="col-6 col-md-3">
                                    <div class="card h-100 shadow-sm border-0">
                                        <a href="{{ route('produk.detail', Crypt::encrypt($p->id)) }}" class="nav-link">
                                            <img src="{{ $p->imageProducts->first()
                                                            ? asset('storage/gambar-produk/' . $p->imageProducts->first()->nama_gambar)
                                                            : asset('asset/image/SkoolaAssets/no-image.png') }}"
                                                 class="card-img-top"
                                                 alt="{{ $p->nama_produk }}"
                                                 style="object-fit:cover; height:200px;">
                                        </a>
                                        <div class="card-body">
                                            <h6 class="card-title mb-1">{{ $p->nama_produk }}</h6>
                                            <p class="text-muted small mb-2">Stok : {{ $p->stok }}</p>
                                            <strong class="text-dark">
                                                Rp {{ number_format($p->harga, 0, ',', '.') }}
                                            </strong>
                                        </div>
                                        <div class="d-flex p-2">
                                            <a class="btn btn-primary w-100 me-2">
                                                <i class="bi bi-whatsapp me-2" style="color: #16DB65"></i>
                                                Chat Penjual
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center text-muted">
                                    Belum ada produk di kategori ini.
                                </div>
                            @endforelse
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
