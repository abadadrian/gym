<?php

namespace App\Http\Controllers;

use App\Models\Sesion;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Activity;

class SesionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sesions = Sesion::all();
        return view('sesion.index', ['sesions' => $sesions]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Sesion $sesion)
    {
        $activities = Activity::all();
        return view('sesion.create', ['sesion' => $sesion, 'activities' => $activities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Creamos automaticamente las sesiones en base a lo introducido por el formulario
        $fechaFormulario = Carbon::create($request->mesSesion);
        // dd($fechaFormulario->dayOfWeekIso);

        $fechaSesion = Carbon::create($fechaFormulario->month);
        // dd($fechaSesion);
        $actividadFormulario = $request->activity;

        $actividad = Activity::find($actividadFormulario);
        $horaInicioFormulario = Carbon::create($request->horaInicio);
        $horaFinalFormulario = Carbon::create($request->horaFinal);

        $diasSesion = $request->diasSesion;

        //Si selecciono varios dias solo me selecciona el ultimo

        //Dias de la semana en los que se imparte la actividad


        $arrDias = [
            '1' => 'Lunes',
            '2' => 'Martes',
            '3' => 'Miércoles',
            '4' => 'Jueves',
            '5' => 'Viernes',
            '6' => 'Sábado',
            '7' => 'Domingo',
        ];


        for ($i = 1; $i < $fechaSesion->daysInMonth; $i++) {

            $horaInicio = Carbon::create($fechaFormulario->year, $fechaFormulario->month, $i, $horaInicioFormulario->hour, $horaInicioFormulario->minute);
            $horaFinal = Carbon::create($fechaFormulario->year, $fechaFormulario->month, $i, $horaFinalFormulario->hour, $horaFinalFormulario->minute);
            // dd($horaFinal);

            if (in_array($horaInicio->dayOfWeekIso, $diasSesion)) {
                $sesion = new Sesion;
                //Para sacar el mes de la sesion
                $sesion->mesSesion = $horaInicio->format('Y-m-d H:i');
                foreach ($arrDias as $diaSemana => $nombreDia) {
                    if ($diaSemana == $horaInicio->dayOfWeekIso) {
                        $sesion->diasSesion = $nombreDia;
                    }
                }
                // $sesion->diasSesion = implode(";", $dia);
                $sesion->horaInicio = $horaInicio->format('Y-m-d H:i');
                $sesion->horaFinal = $horaFinal->format('Y-m-d H:i');
                $sesion->activity_id = $actividad->id;
                $sesion->save();
            }
        }
        // $sesion = Sesion::create($request->all());
        return redirect('/sesions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sesion  $sesion
     * @return \Illuminate\Http\Response
     */
    public function show(Sesion $sesion)
    {
        return view('sesion.show', ['sesion' => $sesion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sesion  $sesion
     * @return \Illuminate\Http\Response
     */
    public function edit(Sesion $sesion)
    {
        return view('sesion.edit', ['sesion' => $sesion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sesion  $sesion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sesion = Sesion::find($id);
        echo ($request->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sesion  $sesion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sesion $sesion)
    {
        dd($sesion);
        $sesion->delete();
        return redirect('/sesions');
    }

    public function debug_fill_month()
    {
        //Y-m-d H:i:s
        $fechaInicio = Carbon::create(2000, 1, 20, 16, 0, 0);
        $fechaFin = Carbon::create(2000, 1, 20, 20, 0, 0);

        // $arrDias = ['Monday','Friday'];
        $arrDias = ['Monday'];

        // $activity = Activity::find( $id );
        $activity = Activity::find(1);

        echo $fechaInicio->hour;
        echo $fechaInicio->minute;
        echo $fechaInicio->second;

        // var_dump( $this->fill_month( $activity, $fechaInicio, $fechaFin, $arrDias ) );

    }

    public function fill_month($activity, $fechaInicio, $fechaFin, $arrDias)
    {

        for ($i = 1; $i < $fechaInicio->daysInMonth + 1; ++$i) {

            $horaInicio = Carbon::create($fechaInicio->year, $fechaInicio->month, $i, $fechaInicio->hour, $fechaInicio->minute, $fechaInicio->second);
            $horaFin = Carbon::create($fechaFin->year, $fechaFin->month, $i, $fechaFin->hour, $fechaFin->minute, $fechaFin->second);

            if (in_array($horaInicio->englishDayOfWeek, $arrDias)) {

                $sesion = new Sesion;
                $sesion->date_start = $horaInicio->format('Y-m-d h:i:s');
                $sesion->date_end = $horaFin->format('Y-m-d h:i:s');
                $sesion->activity_id = $activity->id;
                $sesion->save();

                // $sesions[] = $sesion;
                // echo $dia->englishDayOfWeek;
            }

            // $dates[] = Carbon::createFromDate($fecha->year, $fecha->month, $i, $fecha->hour, $fecha->minute,$fecha->second )->format('Y-m-d h:i:s');
        }

        // return $sesions;

    }
}
