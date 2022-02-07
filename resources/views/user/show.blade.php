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
            <li class="breadcrumb-item"><a href="/users">Usuarios</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ver</li>
        </ol>
    </nav>
    <h1 class="mt-3 mb-3">Información de {{$user->name}}</h1>

    <table id="table" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th style="" data-field="id">
                    <div class="th-inner ">ID</div>
                    <div class="fht-cell"></div>
                </th>
                <th style="" data-field="name">
                    <div class="th-inner ">Nombre</div>
                    <div class="fht-cell"></div>
                </th>
                <th style="" data-field="name">
                    <div class="th-inner ">Email</div>
                    <div class="fht-cell"></div>
                </th>
                <th style="" data-field="name">
                    <div class="th-inner ">DNI</div>
                    <div class="fht-cell"></div>
                </th>
                <th style="" data-field="name">
                    <div class="th-inner ">Peso</div>
                    <div class="fht-cell"></div>
                </th>
                <th style="" data-field="name">
                    <div class="th-inner ">Altura</div>
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
            </tr>
        </thead>
        <tbody>
            <tr data-index="1">
                <td>{{$user->id}}</td>
                <td>{{$user->name}} </td>
                <td>{{$user->email}} </td>
                <td>{{$user->dni}} </td>
                <td>{{$user->weight}} </td>
                <td>{{$user->height}} </td>
                <td>{{$user->birthdate}} </td>
                <td>{{$user->gender}} </td>
            </tr>
        </tbody>
    </table>

    
</div>


</body>
@endsection
</html>