<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Perpustakaan Digital</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fb;
        }
    </style>
</head>
<body>

<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="col-lg-8 col-md-10">

        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body px-4 px-md-5 py-5">

                <!-- LOGO -->
                <div class="text-center mb-4">
                    <i class="bi bi-book-half fs-1 text-primary"></i>
                    <h6 class="mt-2 mb-0 fw-semibold">Perpustakaan Digital</h6>
                    <small class="text-muted">Sistem Peminjaman Buku</small>
                </div>

                <!-- HERO TEXT -->
                <div class="text-center mb-5">
                    <h1 class="fw-bold display-6 mb-3">
                        Sistem Perpustakaan Digital
                    </h1>
                    <p class="text-muted fs-5">
                        Kelola peminjaman buku dengan cepat, rapi, dan efisien
                    </p>
                </div>

                <!-- BUTTON -->
                <div class="d-flex justify-content-center gap-3 mb-5">
                    <a href="{{ route('login') }}" class="btn btn-primary px-4 py-2">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Login
                    </a>

                    <a href="{{ route('register') }}" class="btn btn-outline-secondary px-4 py-2">
                        <i class="bi bi-person-plus me-1"></i> Register
                    </a>
                </div>

                <!-- STATISTIK -->
                <div class="row text-center g-4">
                    <div class="col-md-4">
                        <div class="border rounded-4 p-4 h-100">
                            <i class="bi bi-book fs-1 text-primary"></i>
                            <h2 class="fw-bold mt-2 mb-0">500+</h2>
                            <p class="text-muted mb-0">Koleksi Buku</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="border rounded-4 p-4 h-100">
                            <i class="bi bi-people fs-1 text-success"></i>
                            <h2 class="fw-bold mt-2 mb-0">300+</h2>
                            <p class="text-muted mb-0">Siswa</p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="border rounded-4 p-4 h-100">
                            <i class="bi bi-arrow-repeat fs-1 text-warning"></i>
                            <h2 class="fw-bold mt-2 mb-0">Cepat</h2>
                            <p class="text-muted mb-0">Proses Peminjaman</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- FOOTER -->
        <p class="text-center text-muted mt-4 mb-0">
            © {{ date('Y') }} Perpustakaan Digital
        </p>

    </div>
</div>

</body>
</html>
