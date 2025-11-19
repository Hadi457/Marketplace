@extends('navbar')
@section('content')
@if (Session::get('pesan'))
    <div class="alert alert-success alert-dismissible fade show mb-1 mt-2" role="alert">
        <i class="fas fa-check-circle me-2"></i>
        {{ Session::get('pesan') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>  
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Kirim otomatis stores_id -->
    <input type="hidden" name="stores_id" value="{{ $store->id }}">

    <label>Kategori Produk</label>
    <select name="categories_id" class="form-control" required>
        <option value="">-- Pilih Kategori --</option>
        @foreach ($categories as $c)
            <option value="{{ $c->id }}">{{ $c->nama_kategori }}</option>
        @endforeach
    </select>

    <label>Nama Produk</label>
    <input type="text" name="nama_produk" class="form-control" required>

    <label>Harga</label>
    <input type="number" name="harga" class="form-control" required>

    <label>Stok</label>
    <input type="number" name="stok" class="form-control" required>

    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control" required></textarea>

    <label>Tanggal Upload</label>
    <input type="date" name="tanggal_upload" class="form-control" required>

    <label>Upload Gambar (Bisa Banyak)</label>
    <input type="file" name="nama[]" class="form-control" multiple required>

    <br>
    <button type="submit" class="btn btn-primary">Tambah Produk</button>
</form>


@endsection