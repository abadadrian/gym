<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Sesion;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::all();

        return view('activity.index' , ['activities' => $activities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Activity $activity)
    {
        return view('activity.create', ['activity' => $activity]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validacion
        $rules = [
            'name'=>'required|max:25',
            'description'=> 'required|max:30',
            'activity_minutes' => 'required|max:3',
            'max_participants'=> 'required|max:2',
        ];
        $request->validate($rules);
        $activity= Activity::create($request->all());
        return redirect('/activities');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        // $sesiones= Sesion::all();
        return view('activity.show', ['activity' => $activity]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        return view('activity.edit', ['activity' => $activity]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'activity_minutes' => 'required',
            'max_participants' => 'required',
        ];
        $request->validate($rules);

        //version corta
        $activity->fill($request->all());

        $activity->save();
        return redirect('/activities');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();
        return redirect('/activities');
    }
}
