<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if( Auth::guest() != 1 ){
        return view('home');
    }
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('configuration', 'App\Http\Controllers\AccessControl\Configuration\ConfigurationController')
    ->middleware('auth');

/**
 * Collaborators
 */
Route::resource('colaboradores', 'App\Http\Controllers\AccessControl\CollaboratorController')
    ->middleware('auth');

/**
 * visitors
 */
Route::resource('visitantes', 'App\Http\Controllers\AccessControl\VisitorController')
    ->middleware('auth');

//createVisitorToColabollator
Route::get('/registrar-visitante', 
    [
        App\Http\Controllers\AccessControl\VisitorController::class, 
        'createVisitorToColabollator'
    ])->name('registrar-visitante')
    ->middleware('auth');

/**
 * Configuration
 */

//Companies
Route::resource('empresas', 'App\Http\Controllers\AccessControl\CompanyController')
    ->middleware('auth');

//Areas
Route::resource('areas', 'App\Http\Controllers\AccessControl\AreaController')
    ->middleware('auth');

//Job titles
Route::resource('cargos', 'App\Http\Controllers\AccessControl\JobTitleController')
    ->middleware('auth');

//Locations
Route::resource('ubicaciones', 'App\Http\Controllers\AccessControl\LocationController')
    ->middleware('auth');

//Identifications
Route::resource('tipo-indentificaciones', 'App\Http\Controllers\AccessControl\IdentificationTypeController')
    ->middleware('auth');

//Visitors Types
Route::resource('tipo-visitantes', 'App\Http\Controllers\AccessControl\VisitorTypesController');

//Equipaments Types
Route::resource('tipo-equipos','App\Http\Controllers\AccessControl\EquipmentTypeController');

//vehicles Types
Route::resource('tipo-vehiculos','App\Http\Controllers\AccessControl\VehicleTypeController');

//arls
Route::resource('arls', 'App\Http\Controllers\AccessControl\ArlController')
    ->middleware('auth');
