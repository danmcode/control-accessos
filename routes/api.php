<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/v1/auth',[
    App\Http\Controllers\Auth\LoginApiController::class,
    'apiAuth'
]);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/v1/collaborators', [
        App\Http\Controllers\AccessControl\CollaboratorController::class,
        'getCollaboratorByIdentification'
    ]);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/v1/collaborator/attendance', [
        App\Http\Controllers\Api\AccessControl\CollaboratorAttendanceController::class,
        'setCollaboratorAttendance'
    ]);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/v1/collaborator/attendance/by-day', [
        App\Http\Controllers\Api\AccessControl\CollaboratorAttendanceController::class,
        'getCollaboratorAttendanceByDay'
    ]);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/v1/collaborator/attendance/count-by-day', [
        App\Http\Controllers\Api\AccessControl\CollaboratorAttendanceController::class,
        'getCollaboratorAttendanceCountByDay'
    ]);
});
