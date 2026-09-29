<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="container mt-4 pt-3">

    <h2>Tambah Data Mahasiswa</h2>
    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    @if ($errors->any())
        <div class="alert alert-danger mb-4">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">NPM</label>
            <input type="text" class="form-control" name="npm" value="{{ old('npm') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Program Studi</label>
            <input type="text" class="form-control" name="prodi" value="{{ old('prodi') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Tahun Masuk</label>
            <input type="number" class="form-control" name="tahunmasuk" value="{{ old('tahunmasuk') }}">
        </div>

        <div class="mt-4 mb-5">
            <button type="submit" class="btn btn-primary px-4 py-2">Simpan Data</button>
        </div>
    </form>

</body>

</html>
