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
                data = $("#activity").children("option:selected").val();
                console.log(data);
                location.replace("/dates/filter/" + data);
                $.get("/dates/filter?filter=" + data, function(data, status) {
                    console.log("Data: " + data + "\nStatus: " + status);
                    // console.log(data);
                    $('#destinofiltro').html(data);
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
                    <div class="card-header">{{ __('Mostrar sesiones') }}</div>

                    <div class="card-body">
                        <form method="POST" action="" id="form">
                            @csrf
                            <!-- ACTIVIDADES  -->
                            <div class="row mb-3">
                                <label for="actividad" class="col-md-4 col-form-label text-md-end">{{ __('Actividad') }}</label>
                                <div class="col-md-6">
                                    <select name="activity" id="activity" class="form-select">
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
