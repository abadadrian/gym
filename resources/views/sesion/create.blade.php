@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Añadir sesiones') }}</div>

                <div class="card-body">
                    <form method="POST" action="/sesiones">
                        @csrf
                        <!-- ACTIVIDADES  -->
                        <div class="form-group">
                            <label for="mesSesion">Selecciona la actividad</label>
                            <select class="form-control mb-4" id="exampleFormControlSelect1" >
                                <option selected="selected">Actividades</option>
                            @foreach ($activities as $activity)
                                <option value="{{$activity->name}}">{{$activity->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <!-- MESES -->
                        <div class="form-group">
                            <label for="mesSesion">Selecciona el mes</label>
                            <select class="form-control mb-4" id="exampleFormControlSelect1" >
                                <option>Enero</option>
                                <option>Febrero</option>
                                <option>Marzo</option>
                                <option>Abril</option>
                                <option>Mayo</option>
                                <option>Junio</option>
                                <option>Julio</option>
                                <option>Agosto</option>
                                <option>Septiembre</option>
                                <option>Octubre</option>
                                <option>Noviembre</option>
                                <option>Diciembre</option>
                            </select>
                        </div>
                        <!-- DIAS DE LA SEMANA -->
                        <div class="form-group">
                        <label for="mesSesion">Selecciona los días</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="lunes" value="lunes">
                                <label class="form-check-label" for="lunes">Lunes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="martes" value="martes">
                                <label class="form-check-label" for="martes">Martes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="miercoles" value="miercoles">
                                <label class="form-check-label" for="miercoles">Miércoles</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="jueves" value="jueves">
                                <label class="form-check-label" for="jueves">Jueves</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="viernes" value="viernes">
                                <label class="form-check-label" for="viernes">Viernes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="sabado" value="sabado">
                                <label class="form-check-label" for="sabado">Sábado</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="domingo" value="domingo">
                                <label class="form-check-label" for="domingo">Domingo</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection