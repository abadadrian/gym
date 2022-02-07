@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
    </style>
</head>

<body>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="/users">Usuarios</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar</li>
            </ol>
        </nav>
        <h1 class="mt-3 mb-3">Editar usuario</h1>

        <table id="table" class="table table-bordered table-hover">
            <form action="/users/{{$user->id}}" method="post">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div>
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control mb-3" name="name" placeholder="{{$user->name }}">
                </div>

                <div>
                    <label for="email">Email</label>
                    <input type="text" class="form-control mb-3" name="email" placeholder="{{$user->email }}">
                </div>

                <div>
                    <label for="dni">DNI</label>
                    <input type="text" class="form-control mb-3" name="dni" placeholder="{{$user->dni }}">
                </div>

                <div>
                    <label for="weight">Peso</label>
                    <input type="number" class="form-control mb-3" name="weight" placeholder="{{$user->weight}}">
                </div>
                
                <div>
                    <label for="height">Altura</label>
                    <input type="number" class="form-control mb-3" name="height" placeholder="{{$user->height}}">
                </div>

                <div>
                    <label for="birthdate">Fecha de nacimiento</label>
                    <input type="date" class="form-control mb-3" name="birthdate" placeholder="{{$user->birthdate}}">
                </div>

                <div>
                    <label for="gender">Género</label>
                    <input type="text" class="form-control mb-3" name="gender" placeholder="{{$user->gender }}">
                </div>

                <div>
                    <input class="btn btn-dark" type="submit" value="Actualizar">
                </div>
            </form>
        </table>
    </div>
</body>
</html>
@endsection