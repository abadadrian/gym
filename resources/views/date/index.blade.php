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
                <li class="breadcrumb-item active">Reservas</a></li>
            </ol>
        </nav>
        <h1>Actividades</h1>
        @forelse ($activities as $activity)
        <div class="card-activity" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><b>{{$activity->name}}</b></h5>
                <p class="card-text">{{$activity->description}}</p>
                <a href="#" class="btn btn-primary">Reservar</a>
            </div>
        </div>
        @empty
        <tr>
            <td colspan="7" class>No hay actividades registrados</td>
        </tr>
        @endforelse
    </div>


</body>
@endsection

</html>