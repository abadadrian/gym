<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Sesion;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('role')->except('show','profile', 'edit', 'update');
        // only('show','index'), solo lo implementa en los métodos que le indiques
        // except('show','index'), no lo implementará en los métodos que le indiques
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        $users = User::paginate(5);
        $name = $request->name;
        $role = $request->role;

        if ($name) {
            $users = User::where('name', 'like', "%$name%")->paginate(5);
        }
        if ($role) {
            $users = User::where('role_id', $role)->paginate(5);
        }

        $users->withPath("/users?name=$name&role=$role");
        return view('user.index', [
            'users' => $users,
            'name' => $name,
            'role' => $role,
            'user' => $user
        ]);
    }
    /** 
     *  public function addSesion()
     * {
     *    $user = User::find(1);
     *   $sesion = Sesion::find(2);
     *  $user->addSesion($sesion);
     * $users = User::all();
     *return view('user.index', ['users' => $users]);
     *}
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create($request->all());
        $user->type = "Usuario";
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('user.show', ['user' => User::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required',
            'dni' => 'required',
            'weight' => 'required',
            'height' => 'required',
            'birthdate' => 'required',
            'gender' => 'required',
            'email' => 'required',
        ];
        $request->validate($rules);

        //version corta
        $user->fill($request->all());

        $user->save();
        return redirect('/users');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // dd($user);
        $user->delete();
        return redirect('/users');
    }

    public function profile(){
        $user = auth()->user();
        return view('user.edit', ['user' => $user]);
        
    }
}
