<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PilotaController;

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

Route::get('/api/pilotak', [PilotaController::class, 'getPilotak']);

Route::delete('/api/pilota/{id}', [PilotaController::class, 'deletePilota']);

Route::post('/api/pilota', [PilotaController::class, 'insertPilota']);

Route::get('api/csrf', function() {
    return csrf_token();
});