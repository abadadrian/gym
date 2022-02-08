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

                $.get("/dates/filter?filter=" + data, function(data, status) {
                    // console.log("Data: " + data + "\nStatus: " + status);
                    console.log(data);
                    // $('#destinofiltro').html(data);
                });
            });
        });
    </script>
    <title>Laravel</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Añadir sesiones') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/sesions">
                            @csrf
                            <!-- ACTIVIDADES  -->
                            <div class="row mb-3">
                                <label for="actividad" class="col-md-4 col-form-label text-md-end">{{ __('Actividad') }}</label>
                                <div class="col-md-6">
                                    <select name="activity" class="form-select">
                                        @foreach ($activities as $activity)
                                        <option name="filter" id="filtro" value="{{$activity->id}}">{{$activity->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" id="buscar" class="btn btn-primary">
                                        {{ __('Buscar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    <!-- @forelse ($activities as $activity)
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
        <br><br>
        <h1>Sesiones reservadas de {{$user->name}}</h1>
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
            </tbody>
        </table> -->