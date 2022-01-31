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
                        <div class="row mb-3">
                            <label for="actividad" class="col-md-4 col-form-label text-md-end">{{ __('Actividad') }}</label>
                            <div class="col-md-6">
                                <select class="form-select" id="exampleFormControlSelect1">
                                    @foreach ($activities as $activity)
                                    <option value="{{$activity->name}}">{{$activity->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- MESES -->
                        <div class="row mb-3">
                            <label for="mesSesion" class="col-md-4 col-form-label text-md-end">{{ __('Mes') }}</label>
                            <div class="col-md-6">
                                <select class="form-select" id="exampleFormControlSelect1">
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
                        </div>

                        <!-- DIAS DE LA SEMANA -->
                        <div class="row mb-3">
                            <label for="dias" class="col-md-4 col-form-label text-md-end">{{ __('Días') }}</label>
                            <div class="col-md-6 mt-2">
                                <div class="col-md-6">
                                    <input class="form-check-input" type="checkbox" id="lunes" value="lunes">
                                    <label class="form-check-label" for="lunes">Lunes</label>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-check-input" type="checkbox" id="martes" value="martes">
                                    <label class="form-check-label" for="martes">Martes</label>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-check-input" type="checkbox" id="miercoles" value="miercoles">
                                    <label class="form-check-label" for="miercoles">Miércoles</label>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-check-input" type="checkbox" id="jueves" value="jueves">
                                    <label class="form-check-label" for="jueves">Jueves</label>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-check-input" type="checkbox" id="viernes" value="viernes">
                                    <label class="form-check-label" for="viernes">Viernes</label>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-check-input" type="checkbox" id="sabado" value="sabado">
                                    <label class="form-check-label" for="sabado">Sábado</label>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-check-input" type="checkbox" id="domingo" value="domingo">
                                    <label class="form-check-label" for="domingo">Domingo</label>
                                </div>
                            </div>
                        </div>

                        <!-- HORA INICIO -->
                        <div class="row mb-3">
                            <label for="horaInicio" class="col-md-4 col-form-label text-md-end">{{ __('Hora de inicio') }}</label>
                            <div class="col-md-6 mt-1">
                                <input type="time" id="horaInicio" name="horaInicio" min="09:00" max="18:00" required>
                                <small>Horario(8:00-22:00)</small>
                            </div>
                        </div>

                        <!-- HORA FINAL -->
                        <div class="row mb-3">
                        <label for="horaFinal" class="col-md-4 col-form-label text-md-end">{{ __('Hora de fin') }}</label>
                            <div class="col-md-6 mt-1">
                                <input type="time" id="horaFinal" name="horaFinal" min="09:00" max="18:00" required>
                                <small>Horario (8:00-22:00)</small>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Añadir') }}
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