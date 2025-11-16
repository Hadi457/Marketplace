@extends('Administrator.sidebar')
@section('content')
<link rel="stylesheet" href="{{asset('style/user.css')}}">
<!-- Modal Create Siswa -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Toko</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <!-- Nama Toko -->
                    <div class="mb-3">
                        <label for="nama_toko" class="form-label fw-semibold">Nama Toko <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-store"></i></span>
                            <input type="text" class="form-control" id="nama_toko" name="nama_toko" required placeholder="Masukan Nama Toko">
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label fw-semibold">Deskripsi <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-file-lines"></i></span>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" required placeholder="Masukan Deskripsi Toko" rows="3"></textarea>
                        </div>
                    </div>

                    <!-- Gambar -->
                    <div class="mb-3">
                        <label for="gambar" class="form-label fw-semibold">Gambar Toko <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-image"></i></span>
                            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
                        </div>
                    </div>

                    <!-- Kontak Toko -->
                    <div class="mb-3">
                        <label for="kontak_toko" class="form-label fw-semibold">Kontak Toko <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                            <input type="text" class="form-control" id="kontak_toko" name="kontak_toko" maxlength="13" required placeholder="Masukan Nomor Telepon Toko">
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="mb-3">
                        <label for="alamat" class="form-label fw-semibold">Alamat <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                            <textarea class="form-control" id="alamat" name="alamat" required placeholder="Masukan Alamat Toko" rows="3"></textarea>
                        </div>
                    </div>

                    <!-- User ID -->
                    <div class="mb-3">
                        <label for="users_id" class="form-label fw-semibold">Pilih User <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                            <select name="users_id" id="users_id" class="form-select" required>
                                <option value="">-- Pilih User --</option>
                                
                                {{-- Loop user (isi dari controller) --}}
                                {{-- @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->username }})</option>
                                @endforeach --}}
                            </select>
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
<div class="container">
    <div class="d-flex justify-content-between">
        <h2 class="mt-4 fw-bold">Toko</h2>
        <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary mt-4">Tambah Toko</a>
    </div>
    <hr>
    <table id="example" class="table table-striped nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Nama Toko</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Kontak Toko</th>
                <th>Alamat</th>
                <th>Pemilik</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tokoku</td>
                <td>Lorem ipsum dolor sit amet consectetur</td>
                <td>gambar.jpg</td>
                <td>1234567890987</td>
                <td>Tasikmalaya</td>
                <td>Hadi</td>
                <td>
                    <button class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></button>
                    <button class="btn btn-sm btn-warning"><i class="bi bi-trash-fill"></i></button>
                </td>
            </tr>
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