<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Perpustakaan - Auth</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        }

        .auth-card {
            max-width: 520px; /* ⬅️ INI KUNCI: card jadi lebih kecil */
            width: 100%;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center min-vh-100">

    <div class="auth-card">
        <div class="card shadow border-0 rounded-4">
            <div class="card-body p-4 p-md-4">
                @yield('content')
            </div>
        </div>
    </div>

</div>

</body>
</html>
