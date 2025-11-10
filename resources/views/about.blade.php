@extends('navbar')
@section('content')
<section class="container-fluid text-center m-0 p-0">
    <div class="p-5 text-white"
        style="background: 
                linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                url({{ asset('asset/image/SkoolaAssets/3.jpg') }}) center/cover no-repeat; height: 500px;">
        <div class="container d-flex flex-column justify-content-center align-items-start h-100">
            <h1 class="fw-semibold mb-3">Tentang Kami</h1>
            <p class="mb-4 text-start w-50">Skoola adalah platform marketplace pendidikan yang menghubungkan penjual dan pembeli kebutuhan belajar dalam satu tempat.
Kami hadir untuk memudahkan setiap orang menemukan dan menjual perlengkapan pendidikan dengan cepat, aman, dan terpercaya.</p>
        </div>
    </div>
</section>
@endsection