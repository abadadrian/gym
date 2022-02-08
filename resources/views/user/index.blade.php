@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#buscar').click(function(e) {
                e.preventDefault();
                console.log("ha hecho click");
                data = $('#filtro').val();
                console.log(data);

                $.get("/users/filter?filter=" + data, function(data, status) {
                    // console.log("Data: " + data + "\nStatus: " + status);
                    console.log(data);
                    $('#destinofiltro').html(data);
                });
            });
        });
    </script>
    <title>Usuarios del gimnasio</title>
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
                <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
            </ol>
        </nav>
        <div class="inline">
            <h1>Miembros del gimnasio
                <a href="/users/create" class="btn btn-primary"><i class="fas fa-plus"></i></a>
            </h1>
            <form action="" id="formulario">
                <input type="text" id="filtro">
                <button type="submit" class="btn btn-primary" value="Buscar" id="buscar">
                    <i class="fas fa-search"></i>
                </button>

            </form>
            <table id="destinofiltro" class="table table-bordered table-hover">
            </table>
        </div>

        <table id="table" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th style="" data-field="id">
                        <div class="th-inner ">ID</div>
                        <div class="fht-cell"></div>
                    </th>
                    <th style="" data-field="name">
                        <div class="container">
                            <div class="th-inner ">DNI</div>
                            <div class="fht-cell"></div>
                    </th>
                    <th style="" data-field="name">
                        <div class="th-inner ">Nombre</div>
                        <div class="fht-cell"></div>
                    </th>
                    <th style="" data-field="name">
                        <div class="th-inner ">Peso</div>
                        <div class="fht-cell"></div>
                    </th>
                    <th style="" data-field="name">
                        <div class="th-inner ">Altura </div>
                        <div class="fht-cell"></div>
                    </th>
                    <th style="" data-field="name">
                        <div class="th-inner ">Fecha de nacimiento</div>
                        <div class="fht-cell"></div>
                    </th>
                    <th style="" data-field="name">
                        <div class="th-inner ">Sexo</div>
                        <div class="fht-cell"></div>
                    </th>
                    <th style="" data-field="name">
                        <div class="th-inner ">Rol</div>
                        <div class="fht-cell"></div>
                    </th>
                    <th style="" data-field="name">
                        <div class="th-inner ">Opciones</div>
                        <div class="fht-cell"></div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                <tr data-index="1">
                    <td>{{$user->id}}</td>
                    <td>{{$user->dni}}</td>
                    <td>{{$user->name}} </td>
                    <td>{{$user->weight}} </td>
                    <td>{{$user->height}} </td>
                    <td>{{$user->birthdate}} </td>
                    <td>{{$user->gender}} </td>
                    <td>{{$user->role->name}} </td>
                    <td>
                        <form method="POST" action="/users/{{$user->id}}">
                            @csrf
                            <a href="/users/{{$user->id}}" class="btn btn-primary"><i class="far fa-eye"></i></a>
                            <a href="/users/{{$user->id}}/edit" class="btn btn-primary"><i class="far fa-edit"></i></a>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class>No hay miembros dados de alta</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{$users->links("pagination::bootstrap-4")}}

    </div>

</body>
@endsection

</html>