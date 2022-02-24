<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\DateController;
use App\Models\Sesion;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Mail\SupportMailable;
use Illuminate\Support\Facades\Mail;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/profile', [UserController::class, 'profile'])->middleware('auth');
Route::resource('users', UserController::class)->middleware('auth');
Route::resource('sesions', SesionController::class)->middleware('auth');
Route::resource('activities', ActivityController::class)->middleware('auth');
Route::resource('roles', RoleController::class)->middleware('auth');
Route::controller(DateController::class)
    ->middleware('auth')
    ->group(function () {
        Route::get('/dates/user', 'datesUser');
        Route::post('/dates/reservate/{id}', 'reservate');
        Route::get('/dates/filter/{id}', 'filter');
});
Route::resource('dates', DateController::class)->middleware('auth');

//Grupo de rutas para combinar varias
// Route::prefix('sesions')->group(function () {
//     Route::resource('/', SesionController::class);
//     // Route::get('/sign', [SesionController::class, 'sign'])->name('sign');
// });

Route::get('/email', function () {
    $userName = Auth::User()->name;
    $userMail = Auth::User()->email;
    //Envía el maik al respectivo mail del usuario registrado
    Mail::to($userMail)->send(new SupportMailable($userName));
    return redirect('/home');
});

// Route::get('member', [MemberController::class, 'index']);
// Route::get('member/create', [MemberController::class, 'create']);
// Route::get('member/{id}', [MemberController::class, 'show']);
// Route::post('member', [MemberController::class, 'store']);
// Route::get('member/{id}/edit', [MemberController::class, 'edit']);
// Route::put('member/{id}', [MemberController::class, 'update']);
// Route::delete('member/{id}', [MemberController::class, 'destroy']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
