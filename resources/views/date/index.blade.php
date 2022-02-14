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
                selected = $("#activity").children("option:selected").val();
                console.log(selected);

                $.get("/dates/filter/" + selected, function(res, status) {
                    $("#sesiones").html("");
                    const table = document.getElementById("table");
                    res.forEach((item) => {
                        let row = table.insertRow();
                        let id = row.insertCell(0);
                        id.innerHTML = item.id;
                        let actividad = row.insertCell(1);
                        actividad.innerHTML = item.diasSesion;
                        let mes = row.insertCell(2);
                        mes.innerHTML = item.mesSesion;
                        let horaI = row.insertCell(3);
                        horaI.innerHTML = item.horaInicio;
                        let reservarBoton = row.insertCell(4);
                        reservarBoton .innerHTML = `<button type="submit" class="btn btn-primary"><i class="fas fa-bookmark"></i></button>`;                                                        
                    })
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
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Reservar</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Mostrar sesiones') }}</div>

                    <div class="card-body">

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
                                <button id="buscar" class="btn btn-primary mb-3">
                                    {{ __('Buscar') }}
                                </button>
                                </div>
                                <div class="container">
                                    <table id="table" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th style="" data-field="id">
                                                    <div class="th-inner ">ID</div>
                                                    <div class="fht-cell"></div>
                                                </th>
                                                <th style="" data-field="name">
                                                    <div class="th-inner ">Dia</div>
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
                                                    <div class="th-inner ">Reservar</div>
                                                    <div class="fht-cell"></div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                </div>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
</body>

</html>
@endsection