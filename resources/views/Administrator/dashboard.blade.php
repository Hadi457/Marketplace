@extends('Administrator.sidebar')
@section('content')
<link rel="stylesheet" href="{{asset('style/dashboard.css')}}">
<div class="container">
    <div class="container">
    <h2 class="mb-4 fw-bold">Dashboard</h2>
    <div class="row g-4">
    <div class="col-md-3 col-sm-6">
        <div class="card text-center p-4 text-white" style="background-color: #0D2818">
        <h3>120</h3>
        <p>Pengguna</p>
        </div>
    </div>

    <div class="col-md-3 col-sm-6">
        <div class="card text-center p-4 text-white" style="background-color: #04471C;">
        <h3>45</h3>
        <p>Produk</p>
        </div>
    </div>

    <div class="col-md-3 col-sm-6">
        <div class="card text-center p-4 text-white" style="background-color: #058C42;">
        <h3>78</h3>
        <p>Transaksi</p>
        </div>
    </div>

    <div class="col-md-3 col-sm-6">
        <div class="card text-center p-4 text-white" style="background-color: #16DB65;">
        <h3>10</h3>
        <p>Toko</p>
        </div>
    </div>
    </div>
</div>
</div>
@endsection