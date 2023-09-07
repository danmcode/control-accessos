<?php

use App\Http\Controllers\AccessControl\VisitorController;
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


Route::resource('ingresos-salidas', 'App\Http\Controllers\AccessControl\IncomeExitCollaboratorsController')
    ->middleware('auth');

//in
Route::post('registrar-ingreso/{id}',
    [
        App\Http\Controllers\AccessControl\IncomeExitCollaboratorsController::class,
        'setIncomeCollaborator'
    ])
    ->name('registrar-ingreso')
    ->middleware('auth');

//Out
//in
Route::post('registrar-salida/{id}/{view?}',
    [
        App\Http\Controllers\AccessControl\IncomeExitCollaboratorsController::class,
        'setOutputCollaborator'
    ])
    ->name('registrar-salida')
    ->middleware('auth');


/**
 * visitors
 */
//List a history of all visitors
Route::get('/listar-visitantes',[VisitorController::class,'index'])->name('visitantes-index')->middleware('auth');
//Get the create visitor view
Route::get('/crear-visitante/{id}',[VisitorController::class,'create'])->name('crear-visitante')->middleware('auth');
//Create and Login a First Time Visitor
Route::post('/crear-visitante',[VisitorController::class,'store'])->name('crear-visitante.store')->middleware('auth');

Route::post('registrar-salida-visitante/{id}',
    [
        App\Http\Controllers\AccessControl\IncomeExitVisitorsController::class,
        'setOutputVisitor'
    ])
    ->name('registrar-salida-visitante')
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
