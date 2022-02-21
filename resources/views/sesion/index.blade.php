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
                <li class="breadcrumb-item active" aria-current="page">Sesiones</li>
            </ol>
        </nav>
        <h1 class="mt-3 mb-3">Sesiones de actividades
            <a href="/sesions/create" class="btn btn-primary"><i class="fas fa-plus"></i></a>
        </h1>
        <table id="table" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th style="" data-field="id">
                        <div class="th-inner ">ID</div>
                        <div class="fht-cell"></div>
                    </th>
                    <th style="" data-field="name">
                        <div class="th-inner ">Actividad</div>
                        <div class="fht-cell"></div>
                    </th>
                    <th style="" data-field="name">
                        <div class="th-inner ">Dias</div>
                        <div class="fht-cell"></div>
                    </th>
                    <th style="" data-field="name">
                        <div class="th-inner ">Hora inicio</div>
                        <div class="fht-cell"></div>
                    </th>
                    <th style="" data-field="name">
                        <div class="th-inner ">Hora fin</div>
                        <div class="fht-cell"></div>
                    </th>
                    <th style="" data-field="name">
                        <div class="th-inner ">Opciones</div>
                        <div class="fht-cell"></div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sesions as $sesion)
                <tr data-index="1">
                    <td>{{$sesion->id}}</td>
                    <td>{{$sesion->activity->name}}</td>
                    <!--<td>{{$sesion->mesSesion}}</td>-->
                    <td>{{$sesion->diasSesion}} </td>
                    <td>{{$sesion->horaInicio}} </td>
                    <td>{{$sesion->horaFinal}} </td>
                    <td>
                        <form method="POST" action="/sesions/{{$sesion->id}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class>No hay actividades registrados</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{$sesions->links("pagination::bootstrap-4")}}

    </div>

</body>
@endsection
</html>