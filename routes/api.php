<?php

use App\Http\Controllers\API\BarrioController;
use App\Http\Controllers\API\DistritoController;
use App\Http\Controllers\API\ReporteController;
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

Route::get('/reportes', [ReporteController::class, 'getReporteBeneficiarios']);
Route::get('/reportes/distritos', [ReporteController::class, 'getReporteDistrito']);
Route::get('/reportes/ci/{ci}', [ReporteController::class, 'getReporteCi']);
Route::get('/barrio/data', [BarrioController::class, 'index'])->name('barrio.data');
Route::get('/barrio/{id}', [BarrioController::class, 'show'])->name('barrio.show');
Route::post('/barrio', [BarrioController::class, 'store'])->name('barrio.store');
Route::put('/barrio/{id}', [BarrioController::class, 'update'])->name('barrio.update');


Route::group(['prefix' => 'distrito', 'as' => 'distrito.'], function(){
    Route::get('/data', [DistritoController::class, 'index'])->name('data');
});
