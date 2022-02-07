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
                <li class="breadcrumb-item"><a href="/activities">Actividades</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar</li>
            </ol>
        </nav>
        <h1 class="mt-3 mb-3">Editar actividad</h1>

        <table id="table" class="table table-bordered table-hover">
            <form action="/activities/{{$activity->id}}" method="post">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div>
                    <label for="name">Actividad</label>
                    <input type="text" class="form-control mb-3" name="name" placeholder="{{ old('name') ?  old('name') : $activity->name }}">
                </div>

                <div>
                    <label for="description">Descripción</label>
                    <input type="text" class="form-control mb-3" name="description" placeholder="{{ old('description') ?? $activity->description }}">
                </div>

                <div>
                    <label for="activity_minutes">Duración minutos</label>
                    <input type="number" class="form-control mb-3" name="activity_minutes" placeholder="{{$activity->activity_minutes}}">
                </div>
                
                <div>
                    <label for="max_participants">Nº max de participantes</label>
                    <input type="number" class="form-control mb-3" name="max_participants" placeholder="{{$activity->max_participants}}">
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