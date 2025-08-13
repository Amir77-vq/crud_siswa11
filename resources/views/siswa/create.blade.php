<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>ADD STUDENT PAGE</h1>
    <h2>STUDENT ADITION FORM</h2>
    <a href="/">Back</a>
    <form action="/siswa/store" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="">clas</label>
            <br>
            <select name="clas_id">
            @foreach ($clases as $clas)
                <option value="{{ $clas->id }}">{{ $clas->name }}</option>
            @endforeach
            </select>
            @error('clas_id')
                <small style="color:red">{{$message}}</small>
            @enderror

        </div>
        <div>
            <label for="">Name</label> <br>
            <input type="text" name="name"><br>
            @error('name')
                <small style="color:red">{{$message}}</small>
            @enderror
        </div>
        <div>
            <label for="">NISN</label> <br>
            <input type="text" name="nisn"><br>
        </div>
            @error('nisn')
                <small style="color:red">{{$message}}</small>
            @enderror
        <div>
            <label for="">Address</label> <br>
            <input type="text" name="address"><br>
            @error('address')
                <small style="color:red">{{$message}}</small>
            @enderror
        </div>
        <div>
            <label for="">Email</label> <br>
            <input type="text" name="email"><br>
            @error('email')
                <small style="color:red">{{$message}}</small>
            @enderror
        </div>
        <div>
            <label for="">Password</label> <br>
            <input type="password" name="password"><br>
            @error('password')
                <small style="color:red">{{$message}}</small>
            @enderror
        </div>
        <div>
            <label for="">No Handphone</label> <br>
            <input type="tel" name="no_handphone"><br>
            @error('no_handphone')
                <small style="color:red">{{$message}}</small>
            @enderror
        </div>
        <div>
            <label for="">Foto</label> <br>
            <input type="file" name="foto">
        </div>

            <button type="submit">Save</button>
            <button type="reset">Reset</button>
    </form>
</body>
</html>