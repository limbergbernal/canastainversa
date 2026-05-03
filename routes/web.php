<?php

use App\Http\Controllers\web\BarrioController;
use App\Http\Controllers\web\DashboardController;
use App\Http\Controllers\web\DistritoController;
use App\Http\Controllers\web\ReporteController;
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
    return view('welcome');
});
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::get('barrio', [BarrioController::class, 'index'])->name('barrios');

    Route::get('reportes/distrito', [ReporteController::class, 'getReporteDistrito'])->name('reporte.distrito');

    Route::get('barrios', [BarrioController::class, 'index'])->name('barrios');
    Route::get('distritos', [DistritoController::class, 'index'])->name('distritos');


    Route::get('reportes', [ReporteController::class, 'index'])->name('reportes');
    Route::get('reportes/noEntregados', [ReporteController::class, 'getReporteNoEntregado'])->name('reporte.noentregado');
    Route::get('reportes/ci', [ReporteController::class, 'reporteCi'])->name('reportesCi');
});
