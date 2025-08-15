<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADD CLASS</title>
</head>
<body>
    <h1>ADD CLASS PAGE</h1>
    <h2>CLASS ADITION FORM</h2>
    <a href="/">Back</a>
    <form action="/clas/store" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="">Name Class</label>
            <br>
            <input type="text" name="name" placeholder="Masukkan nama kelas"><br>
            @error('name')
                <small><span style="color: red;">{{ $message }}</span></small>
            @enderror
        </div>
        <div>
            <label for="">deskripsi</label>
            <br>
            <input type="text" name="description"><br>
            @error('description')
                <small><span style="color: red;">{{ $message }}</span></small>
            @enderror
        </div>
        <br>
        <button type="submit">Save</button>
        <button type="reset">Reset</button>
    </form>
</body>

</html>