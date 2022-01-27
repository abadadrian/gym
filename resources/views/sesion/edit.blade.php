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
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
        <h1 class="mt-3 mb-3">Editar actividad</h1>

        <table id="table" class="table table-bordered table-hover">

            <form method="POST" action="/activities/{{$activity->id}}" class="form-floating" >
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <label for="name">Nombre de actividad</label>
                <input type="text" class="form-control mb-3" id="name" placeholder="{{$activity->name}}">

                <label for="description">Descripción</label>
                <input type="text" class="form-control mb-3" id="description" placeholder="{{$activity->description}}">

                <label for="activity_minutes">Duración minutos</label>
                <input type="number" class="form-control mb-3" id="activity_minutes" placeholder="{{$activity->activity_minutes}}">

                <label for="max_participants">Nº max de participantes</label>
                <input type="number" class="form-control mb-3" id="max_participants" placeholder="{{$activity->max_participants}}">

                <button type="submit" class="btn btn-dark">{{ __("Editar")}}</button>

            </form>
        </table>
    </div>


</body>
@endsection

</html>