<?php

namespace App\Http\Controllers;

use App\Models\Date;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Activity;
use App\Models\User;
use App\Models\Sesion;
use Illuminate\Support\Facades\Auth;

class DateController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $activities = Activity::all();
        return view('date.index', ['activities' => $activities, 'user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('date.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Date  $date
     * @return \Illuminate\Http\Response
     */
    public function show(Date $date)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Date  $date
     * @return \Illuminate\Http\Response
     */
    public function edit(Date $date)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Date  $date
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Date $date)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Date  $date
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Objeto usuario logueado
        $user = auth()->user();
        //Sesion (con el ID pasado por parametro)
        $sesion = Sesion::find($id);
        //
        $sesion->users()->detach($user->id);
        return redirect('/dates/user');
    }

    public function filter($filter)
    {
        if (Activity::find($filter)) {
            $sesions = Sesion::where('activity_id', 'LIKE', "%$filter%")->get();
        } else {
            $sesions = Sesion::where('mesSesion', 'LIKE', "%$filter%")->get();
        }
        return $sesions; //devuelve JSON
        //otra opción, devolver código html
        // return view('study.ajax.filter', ['sesions'=>$sesions]);
    }

    public function datesUser()
    {
        $user = Auth::user();
        return view('date.user', ['user' => $user]);
    }

    public function reservate($id)
    {
        $sesion = Sesion::find($id);
        //$objeto -> relacionBelongsToMany()->attach(id del usuario actual);
        $sesion->users()->attach(Auth::id());
    }

}
