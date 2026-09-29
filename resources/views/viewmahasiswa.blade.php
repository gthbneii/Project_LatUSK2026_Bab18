<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="container mt-4 pt-3">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Mahasiswa</h2>
        <a href="{{ route('mahasiswa.create') }}">
            Tambah Data Mahasiswa
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th class="text-center">No</th>
                <th>NPM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Tahun Masuk</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data_mahasiswa as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $item->npm }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->prodi }}</td>
                    <td>{{ $item->tahunmasuk }}</td>
                    <td class="text-center">
                        <a href="{{ route('mahasiswa.edit', $item->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>

                        <form action="{{ route('mahasiswa.destroy', $item->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data mahasiswa.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
