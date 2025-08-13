<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT HOME</title>
</head>
<body>
    <h1><b>STUDENT HOMEPAGE</b></h1>
    <h2>STUDENT LIST</h2>

    {{-- Tombol tambah siswa --}}
    <a href="{{ route('siswa.create') }}">Create Student</a>

    {{-- Pesan sukses --}}
    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    {{-- Tabel daftar siswa --}}
    <table border="5" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Class</th>
                <th>NISN</th>
                <th>Address</th>
                <th>Photo</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @forelse($siswas as $index => $siswa)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $siswa->name }}</td>
                    <td>{{ $siswa->clas->name ?? '-' }}</td> {{-- pastikan relasi clas ada di model User --}}
                    <td>{{ $siswa->nisn }}</td>
                    <td>{{ $siswa->alamat }}</td>
                    <td>
                        @if($siswa->photo)
                            <img src="{{ asset('storage/' . $siswa->photo) }}" alt="Foto Siswa" width="60">
                        @else
                            No photo
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('siswa.show', $siswa->id) }}">Detail</a>
                        <a href="{{ route('siswa.edit', $siswa->id) }}">Edit</a>
                        <a href="{{ route('siswa.delete', $siswa->id) }}"
                        onclick="return confirm('Are you sure you want to delete this student?')">
                        Delete
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">There is no student data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
