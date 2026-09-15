<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - DigitalSolusi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
</head>
<body class="bg-light d-flex align-items-center min-vh-100 py-5">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                
                <div class="card border-0 shadow-lg rounded-4 p-3 p-md-4">
                    <div class="card-body">
                        
                        <div class="text-center mb-4">
                            <div class="bg-indigo text-white rounded-4 d-inline-flex align-items-center justify-content-center mb-3 shadow-sm" style="width: 56px; height: 56px;">
                                <i class="fa-solid fa-user-lock fs-3"></i>
                            </div>
                            <h4 class="fw-bold text-dark mb-1">Admin Portal</h4>
                            <p class="text-muted small">Masuk untuk mengelola data website</p>
                        </div>

                        @if($errors->any())
                            <div class="alert alert-danger small rounded-3 mb-3">
                                <i class="fa-solid fa-circle-exclamation me-1"></i> {{ $errors->first() }}
                            </div>
                        @endif

                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label small fw-semibold text-secondary">Nama Admin</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-user"></i></span>
                                    <input type="text" name="name" id="name" class="form-control border-start-0 bg-light" value="{{ old('name') }}" required autofocus placeholder="Masukan nama admin ">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label small fw-semibold text-secondary">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-key"></i></span>
                                    <input type="password" name="password" id="password" class="form-control border-start-0 bg-light" required placeholder="••••••••">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-indigo w-100 rounded-3 py-2 fw-semibold shadow-sm mb-3">
                                Masuk ke Dashboard <i class="fa-solid fa-arrow-right-to-bracket ms-1"></i>
                            </button>
                        </form>

                        <div class="text-center">
                            <a href="{{ route('dashboard') }}" class="text-decoration-none small text-secondary hover-indigo">
                                <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Website Utama
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>