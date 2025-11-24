@extends('Administrator.sidebar')
@section('content')
<link rel="stylesheet" href="{{asset('style/kategori.css')}}">
<!-- Modal Create Kategori -->
<div class="modal fade" id="modalKategori" tabindex="-1" aria-labelledby="modalKategoriLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalKategoriLabel">Tambah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('kategori.admin.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <!-- Nama Kategori -->
                    <div class="mb-3">
                        <label for="nama_kategori" class="form-label fw-semibold">
                            Nama Kategori <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-tags-fill"></i></span>
                            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control"
                                placeholder="Masukkan Nama Kategori" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Edit Kategori -->
@foreach ($kategori as $item)
<div class="modal fade" id="editKategori{{ $item->id }}" tabindex="-1" aria-labelledby="editKategoriLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editKategoriLabel{{ $item->id }}">Edit Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('kategori.admin.update', Crypt::encrypt($item->id)) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <!-- Nama Kategori -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Kategori <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-tags-fill"></i></span>
                            <input type="text" name="nama_kategori" class="form-control"
                                value="{{ $item->nama_kategori }}" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
<!-- Alert -->
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
<div class="container">
    <div class="d-flex justify-content-between">
        <h2 class="mt-4 fw-bold">Kategori</h2>
        <a href="#" type="button" data-bs-toggle="modal"  data-bs-target="#modalKategori" class="btn btn-primary mt-4">Tambah Kategori</a>
    </div>
    <hr>
    <table id="example" class="table table-striped nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategori as $item)
                <tr>
                    <td>{{$item->nama_kategori}}</td>
                    <td>
                        <a data-bs-toggle="modal" data-bs-target="#editKategori{{$item->id}}" type="button" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                        <a href="{{route('kategori.admin.delete',Crypt::encrypt($item->id))}}" onclick="return confirm('Hapus data ini?')" class="btn btn-sm btn-warning"><i class="bi bi-trash-fill"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function () {
        $('#example').DataTable({
            responsive: true
        });
    });
</script>
@endsection