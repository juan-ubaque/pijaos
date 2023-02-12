<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HospitalController; //permite acceder al controlador hospital
use App\Http\Controllers\PacientesController; //permite acceder al controlador paciente
use App\Http\Controllers\GestionHospitalariaController; //permite acceder al controlador gestion_hospitalaria
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


//Ruta para acceder al controlador hospital
Route::resource('hospital', HospitalController::class);

// Ruat para acceder al controlador paciente
Route::resource('paciente', PacientesController::class);

//Ruta para acceder al controlador de gestion_hospitalaria
Route::resource('gestion_hospitalaria', GestionHospitalariaController::class);
