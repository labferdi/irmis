<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome View</title>
</head>
<body>
    <h1>ini welcome view</h1>

    <hr>
    <p>{{ $text }}</p>
    <hr>
    <ul>
        <p>List</p>
        @foreach($list as $item)
        <li>{{ $item }}</li>
        @endforeach
    </ul>
</body>
</html>