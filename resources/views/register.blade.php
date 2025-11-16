<!doctype html>
<html lang="id">
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Login — Skoola</title>
    <link rel="stylesheet" href="{{ asset('asset/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('style/login.css') }}">

    <style>
        :root{
        --black: #020202;
        --dark-green: #0d2818;
        --pakistan-green: #04471c;
        --sea-green: #058c42;
        --malachite: #16db65;
        }

        html,body { height: 100%; }
        body{
        background: #f7f7f7;
        font-family: "Poppins", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
        -webkit-font-smoothing:antialiased;
        -moz-osx-font-smoothing:grayscale;
        }

        /* Wrapper centering penuh layar */
        
    </style>
    </head>
    <body>

    <div class="page-center">
        <div class="login-card">
            <h3 class="text-center mb-3">Daftar</h3>

            <form action="{{route('register.post')}}" method="POST" novalidate>
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
                    <label for="name">Name</label>
                    <input id="name" name="name" type="name" class="form-control" placeholder="Masukkan name" required>
                </div>
                <div class="mb-3">
                    <label for="username">Username</label>
                    <input id="username" name="username" type="username" class="form-control" placeholder="Masukkan username" required>
                </div>
                <div class="mb-3">
                    <label for="kontak">Kontak</label>
                    <input id="kontak" name="kontak" type="text" class="form-control" placeholder="Masukkan kontak" required>
                </div>

                <div class="mb-3">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" class="form-control" placeholder="Masukkan password" required>
                </div>

                <div class="d-grid gap-2 mt-2">
                    <button type="submit" class="btn btn-login">Masuk</button>
                </div>
            </form>

            <div class="text-register text-center">
                <small class="text-muted">Sudah punya akun? </small>
                <a href="/login">Masuk</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (opsional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
