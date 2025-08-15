<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Class Detail Page</title>
</head>
<body>
    <h1>Class Detail Page</h1>

    <div>
      <div>
        <h3>Name Class: {{ $datakelas->name }}</h3>
        <h3>Description: {{ $datakelas->description }}</h3>
      </div>
      <a href="/clas" class="btn-back">Back</a>
    </div>

</body>
</html>
