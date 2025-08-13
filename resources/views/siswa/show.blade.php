<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Detail Data Siswa</title>
</head>
<body>
    <h1>Detail Siswa</h1>

    {{--profile siswa--}}
    <img src="{{asset ('storage/' . $datauser->photo)}}" width="140">

    {{--nama sisiwa--}}
    <h3>{{$datauser->name}}</h3>

    {{--nisn siswa--}}
    <h3>{{$datauser->nisn}}</h3>

    {{--alamat--}}
    <h3>{{$datauser->alamat}}</h3>

    {{--email siswa--}}
    <h3>{{$datauser->email}}</h3>

    {{--no handphone siswa--}}
    <h3>{{$datauser->no_handphone}}</h3>

</body>
</html>
