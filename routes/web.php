<?php

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


Route::get('/home', 'HomeController@index')->name('home');


Route::group(['namespace' => 'admin', 'middleware' => ['role:super-admin|gerente-mantenimiento', 'auth']], function () {
     include('partials\roles.php');
     include('partials\permisos.php');
     include('partials\usuarios.php');
});


Route::group(['namespace' => 'admin','middleware' => ['auth']], function () {
     Route::get('users/{user}/editUser', 'UserController@editUser')->name('users.editUser');
     Route::put('users/{user}/updateUser', 'UserController@updateUser')->name('users.updateUser');
});
$string='role:super-admin|operador-zona|operador-equipo|tecnico-mantenimiento|jefe-mantenimiento';
$string1='|jefe-supervisores|supervisor|gerente-mantenimiento';
$string=$string.$string1;

Route::group(['namespace' => 'user','middleware' => ['auth']], function () {
     include('partials\profiles.php');
     include('partials\teams.php');
     include('partials\sistemas.php');
     include('partials\subsistemas.php');
     include('partials\equipos.php');
     include('partials\tipos.php');
     include('partials\parametros.php');
     include('partials\protocolos.php');
     include('partials\equipoCaracteristica.php');
     include('partials\tipoProtocolo.php');
     include('partials\tipoCaracteristicas.php');
     include('partials\insumos.php');
     include('partials\herramientas.php');
     include('partials\servicios.php');
     include('partials\repuestos.php');
     include('partials\userzonas.php');
     include('partials\userfallas.php');
     include('partials\fallas.php');
     include('partials\teamfallas.php');
     include('partials\plans.php');
     include('partials\teamplans.php');
     include('partials\zonas.php');
     include('partials\calendarios.php');
     include('partials\agenda.php');
     include('partials\estadistica.php');
    Route::resource('feriados', 'FeriadoController');

});



Route::group(['middleware' => ['auth']], function () {
 Route::post('profiles/store', 'User\ProfileController@store')->name('profiles.store');
 Route::get('profiles', 'User\ProfileController@index')->name('profiles.index');
 Route::get('profiles/create', 'User\ProfileController@create')->name('profiles.create');
 Route::put('profiles/{user}', 'User\ProfileController@update')->name('profiles.update');
 Route::get('profiles/{user}', 'User\ProfileController@show')->name('profiles.show');
 Route::get('profiles/{user}/edit', 'User\ProfileController@edit')->name('profiles.edit');
 Route::get('profiles/{user}/user', 'User\ProfileController@user')->name('profiles.user');
});

 Auth::routes();
