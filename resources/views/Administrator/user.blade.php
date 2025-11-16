@extends('Administrator.sidebar')
@section('content')
<link rel="stylesheet" href="{{asset('style/user.css')}}">
<!-- Modal Create Siswa -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="post">
                @csrf
                <div class="modal-body">

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                            <input type="text" class="form-control" id="name" name="name" required placeholder="Masukan Nama Lengkap">
                        </div>
                    </div>

                    <!-- Username -->
                    <div class="mb-3">
                        <label for="username" class="form-label fw-semibold">Username <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-circle"></i></i></span>
                            <input type="text" class="form-control" id="username" name="username" required placeholder="Masukan Username">
                        </div>
                    </div>

                    <!-- Kontak -->
                    <div class="mb-3">
                        <label for="kontak" class="form-label fw-semibold">Kontak / No HP <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                            <input type="text" class="form-control" id="kontak" name="kontak" maxlength="13" required placeholder="Masukan No HP">
                        </div>
                    </div>

                    <!-- Role -->
                    <div class="mb-3">
                        <label for="role" class="form-label fw-semibold">Role <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-people-fill"></i></span>
                            <select name="role" id="role" class="form-select">
                                <option value="admin">Admin</option>
                                <option value="member">Member</option>
                            </select>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
                            <input type="password" class="form-control" id="password" name="password" required placeholder="Masukan Password">
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
        <h2 class="mt-4 fw-bold">User</h2>
        <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary mt-4">Tambah User</a>
    </div>
    <hr>
    <table id="example" class="table table-striped nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Kontak</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Hadi</td>
                <td>Hadi777</td>
                <td>1234567890987</td>
                <td>Admin</td>
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