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
                <li class="breadcrumb-item active" aria-current="page">Actividades</li>
            </ol>
        </nav>
        <h1 class="mt-3 mb-3">Actividades del gimnasio
            <a href="/activities/create" class="btn btn-primary"><i class="fas fa-plus"></i></a>
        </h1>
        <table id="destinofiltro" class="table table-bordered table-hover">
        </table>
    <table id="table" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th style="" data-field="id">
                    <div class="th-inner ">ID</div>
                    <div class="fht-cell"></div>
                </th>
                <th style="" data-field="name">
                    <div class="th-inner ">Nombre actividad</div>
                    <div class="fht-cell"></div>
                </th>
                <th style="" data-field="name">
                    <div class="th-inner ">Descripción</div>
                    <div class="fht-cell"></div>
                </th>
                <th style="" data-field="name">
                    <div class="th-inner ">Duración minutos</div>
                    <div class="fht-cell"></div>
                </th>
                <th style="" data-field="name">
                    <div class="th-inner ">Nº max participantes</div>
                    <div class="fht-cell"></div>
                </th>
                <th style="" data-field="name">
                    <div class="th-inner ">Opciones</div>
                    <div class="fht-cell"></div>
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($activities ?? '' as $activity)
            <tr data-index="1">
                <td>{{$activity->id}}</td>
                <td>{{$activity->name}}</td>
                <td>{{$activity->description}} </td>
                <td>{{$activity->activity_minutes}} </td>
                <td>{{$activity->max_participants}} </td>
                <td>
                    <form method="POST" action="/activities/{{$activity->id}}">
                        @csrf
                        <a href="/activities/{{$activity->id}}" class="btn btn-primary"><i class="far fa-eye"></i></a>
                        <a href="/activities/{{$activity->id}}/edit" class="btn btn-primary"><i class="far fa-edit"></i></a>
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i>
                        </button>
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
    </div>

</body>
@endsection
</html>