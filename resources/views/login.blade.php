<!doctype html>
<html lang="id">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <title>Login — Skoola</title>
        <link rel="stylesheet" href="{{ asset('asset/fontawesome/css/all.min.css')}}">
        <link rel="stylesheet" href="{{asset('asset/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('style/login.css') }}">
    </head>
    <body>
        <div class="page-center">
            <div class="login-card">
                <h3 class="text-center mb-3">Masuk</h3>
                <form action="{{route('login.post')}}" method="POST">
                    @if (Session::get('pesan'))
                        <div class="alert alert-success alert-dismissible fade show mb-1 mt-2" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ Session::get('pesan') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>  
                    @endif
                    @if (Session::get('pesaneror'))
                        <div class="alert alert-danger alert-dismissible fade show mb-1 mt-2" role="alert">
                            <i class="fa-solid fa-triangle-exclamation me-2"></i>
                            {{ Session::get('pesaneror') }}
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
                    @csrf
                    <div class="mb-3">
                        <label for="username">Username</label>
                        <input id="username" name="username" type="text" class="form-control" placeholder="Masukkan username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" class="form-control" placeholder="Masukkan password" required>
                    </div>
                    <div class="d-grid gap-2 mt-2">
                        <button type="submit" class="btn btn-login">Masuk</button>
                    </div>
                </form>
                <div class="d-flex align-items-center justify-content-center gap-3 text-center py-3">
                    <div class="text-register text-center">
                        <a href="/">Kembali</a>
                    </div>
                    <div class="text-register text-center">
                        <label for="">|</label>
                    </div>
                    <div class="text-register text-center">
                        <small class="text-muted">Belum punya akun? </small>
                        <a href="/register">Daftar</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script src="{{asset('asset/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
