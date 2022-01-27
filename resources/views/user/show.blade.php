<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Miembro: {{$user->name}}</h1>


    <ul>
        <li>
            <strong>DNI: </strong>
            {{ $user->dni }}
        </li>
        <li>
            <strong>Peso: </strong>
            {{ $user->weight }}
        </li>
        <li>
            <strong>Altura: </strong>
            {{ $user->height }}
        </li>
    </ul>
</body>
</html>