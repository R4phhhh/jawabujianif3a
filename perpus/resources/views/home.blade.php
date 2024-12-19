<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table th, .table td {
            text-align: center;
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
            border-radius: 5px;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }

        .container {
            margin-top: 20px;
        }

        .message {
            margin: 20px 0;
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
        }

        .card {
            margin-bottom: 30px;
        }

        .btn-outline-secondary {
            background-color: #007bff;
            color: white;
            border-radius: 5px;
        }

        .form-section {
            margin-bottom: 20px;
        }

        .form-column {
            margin-bottom: 20px;
        }

        .form-column {
            padding: 10px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Perpustakaan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/daftar">Daftar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pinjam">Pinjam</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="text-center mb-4">Selamat Datang di Perpustakaan</h1>
        <p class="text-center">Kelola Anggota, Buku, dan Peminjaman Anda dengan mudah.</p>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h4>Tambah Anggota</h4>
                        <p>Tambahkan anggota baru ke dalam sistem.</p>
                        <a href="/daftar" class="btn btn-custom w-100">Tambah Anggota</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h4>Tambah Buku</h4>
                        <p>Tambah buku baru ke koleksi perpustakaan.</p>
                        <a href="/daftar" class="btn btn-custom w-100">Tambah Buku</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h4>Peminjaman</h4>
                        <p>Proses peminjaman buku untuk anggota.</p>
                        <a href="/pinjam" class="btn btn-custom w-100">Pinjam Buku</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>