@extends('layouts.app')

@section('content')
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
                                    <option value="{{$activity->id}}">{{$activity->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- FECHA -->
                        <div class="row mb-3">
                            <label for="mesSesion" class="col-md-4 col-form-label text-md-end">{{ __('Fecha sesion') }}</label>

                            <div class="col-md-6">
                                <input id="mesSesion" type="date" class="form-control @error('mesSesion') is-invalid @enderror" name="mesSesion" value="{{ old('mesSesion') }}" required autocomplete="mesSesion" autofocus>

                                @error('mesSesion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- DIAS DE LA SEMANA -->
                        <div class="row mb-3">
                            <label for="dias" class="col-md-4 col-form-label text-md-end">{{ __('Días') }}</label>
                            <div class="col-md-6 mt-2">
                                <div class="col-md-6">
                                    <input class="form-check-input" type="checkbox" name="diasSesion" id="lunes" value="1">
                                    <label class="form-check-label" for="lunes">Lunes</label>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-check-input" type="checkbox" name="diasSesion" id="martes" value="2">
                                    <label class="form-check-label" for="martes">Martes</label>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-check-input" type="checkbox" name="diasSesion" id="miercoles" value="3">
                                    <label class="form-check-label" for="miercoles">Miércoles</label>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-check-input" type="checkbox" name="diasSesion" id="jueves" value="4">
                                    <label class="form-check-label" for="jueves">Jueves</label>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-check-input" type="checkbox" name="diasSesion" id="viernes" value="5">
                                    <label class="form-check-label" for="viernes">Viernes</label>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-check-input" type="checkbox" name="diasSesion" id="sabado" value="6">
                                    <label class="form-check-label" for="sabado">Sábado</label>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-check-input" type="checkbox" name="diasSesion" id="domingo" value="7">
                                    <label class="form-check-label" for="domingo">Domingo</label>
                                </div>
                            </div>
                        </div>

                        <!-- HORA INICIO -->
                        <div class="row mb-3">
                            <label for="horaInicio" class="col-md-4 col-form-label text-md-end">{{ __('Hora de inicio') }}</label>
                            <div class="col-md-6 mt-1">
                                <input type="time" id="horaInicio" name="horaInicio" min="08:00" max="22:00" required>
                                <small>Horario(8:00-22:00)</small>
                            </div>
                        </div>

                        <!-- HORA FINAL -->
                        <div class="row mb-3">
                        <label for="horaFinal" class="col-md-4 col-form-label text-md-end">{{ __('Hora de fin') }}</label>
                            <div class="col-md-6 mt-1">
                                <input type="time" id="horaFinal" name="horaFinal" min="08:00" max="22:00" required>
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