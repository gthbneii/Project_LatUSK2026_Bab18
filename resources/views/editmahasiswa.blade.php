<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="container mt-5">

    <h2>Edit Data Mahasiswa</h2>
    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <!-- Notifikasi Error Validasi -->
    @if ($errors->any())
        <div class="alert alert-danger mb-4">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Wajib menggunakan directive @method('PUT') untuk proses update -->

        <div class="mb-3">
            <label class="form-label">NPM</label>
            <input type="text" class="form-control" name="npm" value="{{ old('npm', $mahasiswa->npm) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" value="{{ old('nama', $mahasiswa->nama) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Program Studi</label>
            <input type="text" class="form-control" name="prodi" value="{{ old('prodi', $mahasiswa->prodi) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Tahun Masuk</label>
            <input type="number" class="form-control" name="tahunmasuk"
                value="{{ old('tahunmasuk', $mahasiswa->tahunmasuk) }}">
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-warning px-4 py-2">Update Data</button>
        </div>
    </form>

</body>

</html>
