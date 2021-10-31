<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\welcomeController;
use App\Http\Controllers\TrajetController;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TransporteurController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AuthController;
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

/*Route::get('/', function () {
    return view('welcome');
});




Route::group(['middleware' => 'Chauffeur'], function () {

});


Route::group(['middleware' => 'Client'], function () {


});


Route::group(['middleware' => 'Transporteur'], function () {


});

Route::group(['middleware' => 'Administrateur'], function () {
});
*/

//Route::get('/', [welcomeController::class,'connexion']);
Route::get('/', [AuthController::class, 'protect']);
Route::get('welcome', [welcomeController::class,'connexion']);

/* Connexion */
Route::get('sign-in', [AuthController::class, 'sign_in']);
Route::post('connexion', [AuthController::class, 'connexion']);
Route::get('deconnexion', [AuthController::class, 'logout']);

/* Gestion des clients */
Route::resource('clientStore', ClientController::class);
Route::resource('client', ClientController::class);
Route::get('client/status/{id}', [ClientController::class, 'status']);
Route::post('client/reservation', [CourseController::class, 'index']);

/* Gestion des chauffeur */
Route::resource('chauffeurStore', ChauffeurController::class);
Route::get('chauffeur/status/{id}', [ChauffeurController::class, 'status']);
Route::resource('chauffeur', ChauffeurController::class);

/* Gestion des transporteur */
Route::resource('transporteurStore', TransporteurController::class);
Route::resource('transporteur', TransporteurController::class);
Route::resource('transporteurShow', TransporteurController::class);
Route::resource('transporteurStatus', TransporteurController::class);
Route::get('transporteur/status/{id}', [TransporteurController::class, 'status']);


/* Gestion des trajets */
Route::get('trajet/create', [TrajetController::class, 'create']);
Route::get('trajet/index', [TrajetController::class, 'index']);
Route::resource('trajet', TrajetController::class);
//Route::resource('trajetStore', TrajetController::class);
Route::get('trajet/status/{id}', [TrajetController::class, 'status']);
Route::get('trajet/search-villes/{ville}', [TrajetController::class, 'searchVille']);
Route::get('trajetClient/create', [TrajetController::class, 'create']);

/* Gestion des courses */
Route::resource('course', CourseController::class);
Route::resource('courseStore', CourseController::class);
Route::get('course/status/{id}', [CourseController::class, 'status']);

/* Gestion des reservation */
Route::get('reservationStore/{id}', [ReservationController::class, 'create']);
Route::resource('reservation', ReservationController::class);
Route::resource('reservationStore', ReservationController::class);
Route::get('reservation/index', [ClientController::class, 'index']);
Route::post('reserver', [ReservationController::class, 'store']);

/* Gestion des vehicules */
Route::get('vehicule/status/{id}', [VehiculeController::class, 'status']);
Route::get('vehicule/index', [VehiculeController::class, 'index']);
Route::resource('vehicule', VehiculeController::class);
