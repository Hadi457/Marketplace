@extends('navbar')
@section('content')
<div class="container mt-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Semua Toko</h2>
        <p class="text-muted">Temukan berbagai kebutuhan sekolah dari penjual terpercaya di Skoola</p>
    </div>
</div>
<section class="container mb-5">
    <div class="row">
        @foreach ($stores as $item)
            <div class="col-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-start mb-2">
                            <div class="bg rounded-3 d-flex align-items-center justify-content-center me-3" style="width:54px;height:54px;border-radius:10px;">
                                {{-- <strong class="text-inisial">KT</strong> --}}
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
@endsection