@extends('Administrator.sidebar')
@section('content')
<link rel="stylesheet" href="{{asset('style/user.css')}}">
<!-- Modal Create User -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('user.store')}}" method="post">
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
<!-- Modal Edit User -->
@foreach ($users as $item)
    <div class="modal fade" id="editUser{{ $item->id }}" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('user.update', Crypt::encrypt($item->id)) }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                <input type="text" class="form-control" name="name"
                                    value="{{ $item->name }}" required placeholder="Masukan Nama Lengkap">
                            </div>
                        </div>
                        <!-- Username -->
                        <div class="mb-3">
                            <label for="username" class="form-label fw-semibold">Username</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                                <input type="text" class="form-control" name="username"
                                    value="{{ $item->username }}" required placeholder="Masukan Username">
                            </div>
                        </div>
                        <!-- Kontak -->
                        <div class="mb-3">
                            <label for="kontak" class="form-label fw-semibold">Kontak / No HP</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                <input type="text" class="form-control" name="kontak" maxlength="13"
                                    value="{{ $item->kontak }}" required placeholder="Masukan No HP">
                            </div>
                        </div>
                        <!-- Role -->
                        <div class="mb-3">
                            <label for="role" class="form-label fw-semibold">Role</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-people-fill"></i></span>
                                <select name="role" class="form-select">
                                    <option value="admin" {{ $item->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="member" {{ $item->role == 'member' ? 'selected' : '' }}>Member</option>
                                </select>
                            </div>
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">
                                Password <small class="text-muted">(Kosongkan jika tidak diganti)</small>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
                                <input type="password" class="form-control" name="password"
                                    placeholder="Masukan password baru (opsional)">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Perbarui</button>
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
            @foreach ( $users as $item )
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->username}}</td>
                    <td>{{$item->kontak}}</td>
                    <td>{{$item->role}}</td>
                    <td>
                        <a data-bs-toggle="modal" data-bs-target="#editUser{{ $item->id }}" type="button" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                        <a href="{{route('user.delete',Crypt::encrypt($item->id))}}" onclick="return confirm('Hapus data ini?')" class="btn btn-sm btn-warning"><i class="bi bi-trash-fill"></i></a>
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