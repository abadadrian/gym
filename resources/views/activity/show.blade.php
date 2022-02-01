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
                <li class="breadcrumb-item"><a href="/activities">Activities</a></li>
                <li class="breadcrumb-item active" aria-current="page">Show</li>
            </ol>
        </nav>
        <h1 class="mt-3 mb-3">{{$activity->name}}</h1>

        <table id="table" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th style="" data-field="id">
                        <div class="th-inner ">ID</div>
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
                </tr>
            </thead>
            <tbody>
                <tr data-index="1">
                    <td>{{$activity->id}}</td>
                    <td>{{$activity->description}} </td>
                    <td>{{$activity->activity_minutes}} </td>
                    <td>{{$activity->max_participants}} </td>
                </tr>
            </tbody>
        </table>
        <br>
        <h1 class="mt-3 mb-3">Sesiones asignadas</h1>

        <table id="table" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th style="" data-field="id">
                    <div class="th-inner ">ID</div>
                    <div class="fht-cell"></div>
                </th>
                <th style="" data-field="name">
                    <div class="th-inner ">Mes</div>
                    <div class="fht-cell"></div>
                </th>
                <th style="" data-field="name">
                    <div class="th-inner ">Días</div>
                    <div class="fht-cell"></div>
                </th>
                <th style="" data-field="name">
                    <div class="th-inner ">Hora inicio</div>
                    <div class="fht-cell"></div>
                </th>
                <th style="" data-field="name">
                    <div class="th-inner ">Hora final</div>
                    <div class="fht-cell"></div>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($activity->sesions as $sesion)
            <tr data-index="1">
                <td>{{$sesion->id}}</td>
                <td>{{$sesion->diasSesion}} </td>
                <td>{{$sesion->mesSesion}} </td>
                <td>{{$sesion->horaInicio}} </td>
                <td>{{$sesion->horaFinal}} </td>
            </tr>
            @endforeach 
        </tbody>
    </table>

    </div>


</body>
@endsection

</html>