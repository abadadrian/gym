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
                <li class="breadcrumb-item active" aria-current="page">Users</li>
            </ol>
        </nav>
        <h1>Miembros del gimnasio
            <a href="/users/create" class="btn btn-dark">Nuevo</a>
        </h1>

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
                            <a href="/users/{{$user->id}}" class="btn btn-dark">Ver</a>
                            <a href="/users/{{$user->id}}/edit" class="btn btn-dark">Editar</a>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-dark">{{ __("Eliminar")}}
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
    </div>

</body>
@endsection

</html>