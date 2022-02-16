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
 
Route::resource('users', UserController::class);
Route::resource('sesions', SesionController::class);
Route::resource('activities', ActivityController::class);
Route::resource('roles', RoleController::class);
Route::controller(DateController::class)->group(function (){
    Route::get('/dates/user','datesUser');
    Route::post('/dates/reservate/{id}','reservate');
    Route::get('/dates/filter/{id}','filter');
});
Route::resource('dates', DateController::class);


//Grupo de rutas para combinar varias
// Route::prefix('sesions')->group(function () {
//     Route::resource('/', SesionController::class);
//     // Route::get('/sign', [SesionController::class, 'sign'])->name('sign');
// });


// Route::get('member', [MemberController::class, 'index']);
// Route::get('member/create', [MemberController::class, 'create']);
// Route::get('member/{id}', [MemberController::class, 'show']);
// Route::post('member', [MemberController::class, 'store']);
// Route::get('member/{id}/edit', [MemberController::class, 'edit']);
// Route::put('member/{id}', [MemberController::class, 'update']);
// Route::delete('member/{id}', [MemberController::class, 'destroy']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
