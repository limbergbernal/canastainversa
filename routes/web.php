<?php

use App\Http\Controllers\web\BarrioController;
use App\Http\Controllers\web\DashboardController;
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
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/barrios',[BarrioController::class, 'index'])->name('dashboard.barrios');
Route::get('dashboard/reportes',[ReporteController::class, 'index'])->name('dashboard.reportes');
Route::get('dashboard/reportes/ci',[ReporteController::class, 'reporteCi'])->name('dashboard.reportesCi');
