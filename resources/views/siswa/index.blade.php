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
  <a href="siswa/create">Create Student</a>
  <table border="1">
    <thead>
      <tr>
        <td>No</td>
        <td>Name</td>
        <td>Class</td>
        <td>Nisn</td>
        <td>Address</td>
        <td>Photo</td>
        <td>Option</td>
      </tr>
    </thead>
    <tbody>
      @foreach ( $siswas as $siswa )
      
      <tr>
        <td>{{ $siswa->id }}</td>
        <td>{{ $siswa->name }}</td>
        <td>{{ $siswa->Clas->name }}</td>
        <td>{{ $siswa->nisn }}</td>
        <td> {{ $siswa->alamat }}</td>
        <td>
  <img src="{{ asset('storage/' . $siswa->photo) }}" alt="photo" width="80">
</td>

        <td>
          <a href="">DELETE</a> |
          <a href="">EDIT</a> |
          <a href="">DETAIL</a> |
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>