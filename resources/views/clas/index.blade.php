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
<hr>
    <a href="/clas/create">Add Class</a> <a href="/">Homepage</a>

    <table border="10" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Name Class</th>
                <th>Description</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classes as $class)
                <tr>
                    <td>{{ $class->id }}</td>
                    <td>{{ $class->name }}</td>
                    <td>{{ $class->description }}</td>
                    <td>
                        <a href="/clas/delete/{{ $class->id }}">DELETE</a>
                        <a href="/clas/edit/{{ $class->id }}">EDIT</a>
                        <a href="/clas/show/{{ $class->id }}">DETAIL</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>