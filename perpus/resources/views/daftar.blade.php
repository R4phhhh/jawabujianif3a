<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Anggota, Buku, dan Peminjaman</title>
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
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page">Daftar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pinjam">Pinjam</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <h1 class="text-center mb-4">Tambah Anggota, Buku, dan Peminjaman</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            <div class="col-md-4 form-column">
                <h3 class="text-center">Tambah Anggota</h3>
                <form action="/anggota" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_anggota" class="form-label">Nama Anggota</label>
                        <input type="text" class="form-control" id="nama_anggota" name="nama_anggota" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <input type="text" class="form-control" id="jurusan" name="jurusan" required>
                    </div>
                    <div class="mb-3">
                        <label for="tgl_daftar" class="form-label">Tanggal Daftar</label>
                        <input type="date" class="form-control" id="tgl_daftar" name="tgl_daftar" value="{{ now()->format('Y-m-d') }}" required readonly>
                    </div>
                    <button type="submit" class="btn btn-custom w-100">Simpan</button>
                </form>
            </div>

            <div class="col-md-4 form-column">
                <h3 class="text-center">Tambah Buku</h3>
                <form action="/buku" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="judul_buku" class="form-label">Judul Buku</label>
                        <input type="text" class="form-control" id="judul_buku" name="judul_buku" required>
                    </div>
                    <div class="mb-3">
                        <label for="penerbit" class="form-label">Penerbit</label>
                        <input type="text" class="form-control" id="penerbit" name="penerbit" required>
                    </div>
                    <div class="mb-3">
                        <label for="pengarang" class="form-label">Pengarang</label>
                        <input type="text" class="form-control" id="pengarang" name="pengarang" required>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                    </div>
                    <button type="submit" class="btn btn-custom w-100">Simpan</button>
                </form>
            </div>

            <div class="col-md-4 form-column">
                <h3 class="text-center">Peminjaman</h3>
                <form action="/detailpinjam" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="anggota_id" class="form-label">Nama Anggota</label>
                        <select class="form-select" id="anggota_id" name="anggota_id" required>
                            @foreach($anggota as $ang)
                                <option value="{{ $ang->id }}">{{ $ang->nama_anggota }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="buku_id" class="form-label">Judul Buku</label>
                        <select class="form-select" id="buku_id" name="buku_id" required>
                            <option value="" disabled>Select a book</option> <!-- Optional: a prompt for users -->
                            @foreach($buku as $bk)
                                <option value="{{ $bk->id }}" 
                                    @if(old('buku_id') == $bk->id || (empty(old('buku_id')) && $loop->first)) selected @endif>
                                    {{ $bk->judul_buku }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                        <input type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam" required>
                    </div>
                    <div class="mb-3">
                        <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
                        <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali" required>
                    </div>
                    <button type="submit" class="btn btn-custom w-100">Simpan</button>
                </form>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-4">
                <h2 class="text-center mb-4">List Anggota</h2>
                <table class="table table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <th>Nama Anggota</th>
                            <th>Alamat</th>
                            <th>Jurusan</th>
                            <th>Tanggal Daftar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($anggota as $ang)
                            <tr>
                                <td>{{ $ang->nama_anggota }}</td>
                                <td>{{ $ang->alamat }}</td>
                                <td>{{ $ang->jurusan }}</td>
                                <td>{{ $ang->tgl_daftar }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-md-4">
                <h2 class="text-center mb-4">List Buku</h2>
                <table class="table table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <th>Judul Buku</th>
                            <th>Penerbit</th>
                            <th>Pengarang</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($buku as $bk)
                            <tr>
                                <td>{{ $bk->judul_buku }}</td>
                                <td>{{ $bk->penerbit }}</td>
                                <td>{{ $bk->pengarang }}</td>
                                <td>{{ $bk->jumlah }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-md-4">
                <h2 class="text-center mb-4">List Peminjaman</h2>
                <table class="table table-bordered">
                    <thead class="table-primary">
                        <tr>
                            <th>No. Pinjam</th>
                            <th>Nama Anggota</th>
                            <th>Judul Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($detailPinjam as $dp)
                            <tr>
                                <td>{{ $dp->id }}</td>
                                <td>{{ $dp->anggota->nama_anggota }}</td>
                                <td>{{ $dp->buku->judul_buku }}</td>
                                <td>{{ $dp->tgl_pinjam }}</td>
                                <td>{{ $dp->tgl_kembali }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>