@extends('Administrator.sidebar')
@section('content')
<link rel="stylesheet" href="{{asset('style/dashboard.css')}}">
<div class="container">
    <div class="container">
    <h2 class="mb-4 fw-bold">Dashboard</h2>
    <div class="row g-4">
    <div class="col-md-4 col-sm-6">
        <div class="card text-center p-4 text-dark">
        <h3>120</h3>
        <p>Pengguna</p>
        </div>
    </div>

    <div class="col-md-4 col-sm-6">
        <div class="card text-center p-4 text-dark">
        <h3>45</h3>
        <p>Produk</p>
        </div>
    </div>

    <div class="col-md-4 col-sm-6">
        <div class="card text-center p-4 text-dark">
        <h3>10</h3>
        <p>Toko</p>
        </div>
    </div>
    </div>
</div>
</div>
@endsection