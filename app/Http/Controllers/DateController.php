<?php

namespace App\Http\Controllers;

use App\Models\Date;
use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\User;
use App\Models\Sesion;


class DateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $user= auth()->user();
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
    public function destroy(Date $date)
    {
        //
    }

    public function filter ($id) {
        $sesions = Sesion::where('activity_id', 'LIKE', "%$id%")->get();
        return $sesions; //devuelve JSON
        //otra opción, devolver código html
        // return view('study.ajax.filter', ['sesions'=>$sesions]);
        }

    public function datesUser(){
        $user= auth()->user();
        dd($user);
    }
}
